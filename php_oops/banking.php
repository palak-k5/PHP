<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Customer
{
    private static int $id=100;
    private int $custId;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(string $fname, string $lname,string $email)
    {
        $this->custId=self::$id++;
        $this->firstName=$fname;
        $this->lastName=$lname;
        $this->email=$email;
        // $this->$custId means “variable variable” wrong
    }
    public function getCustomerDetails(): string 
    {
        return 
        "Customer First name : "." ".$this->firstName."<br>".
        "Customer last name : "." ".$this->lastName."<br>".
        "Customer email : "." ".$this->email."<br>";
    }
    public function __destruct()
    {
        echo "destructor function called for Customer class object<br>";
    }

}

class Account {
    private static int $acc_count=10000;
    protected int $accNo;
    protected float $balance;

    public function __construct(float $balance)
    {
        if($balance<0)
        {
            throw new Exception ("Balance cannot be negative");
        }
        $this->accNo=self::$acc_count++;
        $this->balance=$balance;
    }
    public function getBalance():float
    {
        return $this->balance;
    }
    public function getAccountNo(): int
    {
        return $this->accNo;
    }
    public function getAccountDetails(): string 
    {
        return "User with "." ". $this->accNo." as account number has balance of ".$this->getBalance()."<br>";
    }
    public function deposit(float $amt):  void
    {
        if($amt<=0)
        {
            throw new Exception("enter correct amount");
        }
        $this->balance+=$amt;
    }
    public function withdraw(float $amt) : void
    {
        if ($amt <= 0) 
        {
            throw new Exception("Withdraw amount should be valid");
        }
        if($amt>$this->balance)
        {
            throw new Exception("you dont have enough balance");
        }
        $this->balance-=$amt;
    }
    public function __destruct()
        {
            echo "destructor function called for account class object<br>";
        }

    }

class SavingsAccount extends Account{
    private float $interestRate;
    public function __construct(float $balance,float $rate)
    {
        parent::__construct($balance);
        $this->interestRate=$rate;

    }
    public function getRate(): float
    {
        return $this->interestRate;
    }
    public function calculateInterest() :float
    {
        return $this->balance * $this->interestRate / 100;
    }
    public function getAccountDetails() : string
    {
        return parent::getAccountDetails()."Interest Rate: {$this->interestRate}\n";
    }
}

class CurrentAccount extends Account{
    private float $limit;
    public function __construct(float $balance,float $limit)
    {
        parent::__construct($balance);
        $this->limit=$limit;
    }
    public function getlimit():float
    {
        return $this->limit;
    }
    public function getAccountDetails() : string
    {
        return parent::getAccountDetails()."overdraft limit : {$this->limit}\n";
    }
}
class Transaction
{
    private float $amount;
    private string $type;
    private string $date;
    
    public function __construct(float $amount, string $type)
    {
        if ($amount <= 0) 
        {
            throw new Exception ("Amount should be > 0");
        }
        $allowtrans= ["deposit", "withdraw"];
        if (!in_array($type, $allowtrans)) 
        {
            throw new Exception("Invalid transaction type");
        }
        $this->amount = $amount;
        $this->type = $type;
        $this->date = date("Y-m-d H:i:s");
    }
    public function getTransactionDetails(): string
    {
        return "type: " . $this->type . "<br>"
         ."amount: " . $this->amount . "<br>"
        ."date: " . $this->date . "<br>";
    }
    public function __destruct()
    {
            echo "destructor function called for transaction class object<br>";
    }
}

try
{
    $obj1= new Customer("Palak","Kumrawat","palak@gmail.com");
    echo $obj1->getCustomerDetails();
    // unset($obj1);  //destructor will be called
    // $acc1= new Account(-15000);

    $acc1= new Account(15000);


    // $acc2=new Account();
    // $acc2->getAccountDetails();

    // echo $acc1->balance; 

    echo $acc1->getAccountDetails();
    $acc1->deposit(20000);

    echo $acc1->getAccountDetails();
    $acc1->withdraw(290);
    echo $acc1->getAccountDetails();


    $trans1=new Transaction(200,"deposit");
    echo $trans1->getTransactionDetails();



    // echo "<hr><hr>";
    // $savings = new SavingsAccount(5000, 5); 
    // $current = new CurrentAccount(5000, 2000);

    // // echo "Savings Balance: " . $savings->getBalance() . "<br>";  // check eextends destructor call
    // echo "Interest: " . $savings->calculateInterest() .$savings->getAccountDetails(). "<br><br>";

    // // echo "Current Balance: " . $current->getBalance() . PHP_EOL;
    // echo "Overdraft Limit: " . $current->getlimit() . "<br>";
}
catch(Exception $e)
{
    echo $e->getMessaage();
}

?>
