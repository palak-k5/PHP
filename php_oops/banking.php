
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Customer
{
    private static $id=100;
    public $custid;
    public $firstName;
    public $lastName;
    public $email;

    public function __construct($fname,$lname,$email)
    {
        $this->custid=self::$id++;
        $this->firstName=$fname;
        $this->lastName=$lname;
        $this->email=$email;
        // $this->$custid means “variable variable” wrong
    }

    public function getcustdetails()
    {
        echo "Customer First name : "." ".$this->firstName."<br>";
        echo "Customer last name : "." ".$this->lastName."<br>";
        echo "Customer email : "." ".$this->email."<br>";

    }
    public function __destruct()
    {
        echo "destructor function called for Customer class object<br>";
    }

}

    class Account {
        private static $acc_count=10000;
        protected $accNo;
        protected $balance;

        public function __construct($balance)
        {
            if($balance<0)
                {
                    die("Balance cannot be negative");
                }
            $this->accNo=self::$acc_count++;
            $this->balance=$balance;
        }
        public function getbalance()
        {
            return $this->balance;
        }
        public function getaccno()
        {
            return $this->accNo;
        }
        public function getaccdetails()
        {
            echo "User with "." ". $this->accNo." as account number has balance of ".$this->getbalance()."<br>";
        }
        public function deposit($amt)
        {
            if($amt<=0)
                {
                    die("enter correct amount");
                }
            $this->balance+=$amt;
        }
        public function withdraw($amt)
        {
            if ($amt <= 0) {
                    die("Withdraw amount should be valid");
                }
            if($amt>$this->balance)
                {
                    die("you dont have enough balance");
                }
                
            $this->balance-=$amt;
        }
        public function __destruct()
        {
            echo "destructor function called for account class object<br>";

        }

    }

    class SavingsAccount extends Account{
        private $interest_rate;
        public function __construct($balance,$rate)
        {
            parent::__construct($balance);
            $this->interest_rate=$rate;

        }
        public function getrate()
        {
            return $this->interest_rate;
        }
        public function calculateinterest()
        {
            return $this->balance * $this->interest_rate / 100;
        }

    }

    class CurrentAccount extends Account{
        private $limit;
        public function __construct($balance,$limit)
        {
            parent::__construct($balance);
            $this->limit=$limit;

        }
        public function getlimit(){
            return $this->limit;
        }
    }
    class Transaction
    {
        protected $amount;
        public $type;
        protected $date;

        public function __construct($amount, $type)
        {
            if ($amount <= 0) {
                die("Amount should be > 0");
            }

            $allowtrans= ["deposit", "withdraw"];

            if (!in_array($type, $allowtrans)) {
                die("Invalid transaction type");
            }

            $this->amount = $amount;
            $this->type = $type;
            $this->date = date("Y-m-d H:i:s");
        }
        public function gettransdetails()
        {
            echo "type: " . $this->type . "<br>";
            echo "amount: " . $this->amount . "<br>";
            echo "date: " . $this->date . "<br>";
        }
    

        public function __destruct()
        {
            echo "destructor function called for transaction class object<br>";
        }
    }


$obj1= new Customer("Palak","Kumrawat","palak@gmail.com");
$obj1->getcustdetails();
// unset($obj1);  //destructor will be called
// $acc1= new Account(-15000);

$acc1= new Account(15000);


// $acc2=new Account();
// $acc2->getaccdetails();

// echo $acc1->balance; 

$acc1->getaccdetails();
$acc1->deposit(20000);

$acc1->getaccdetails();
$acc1->withdraw(290);
$acc1->getaccdetails();


$trans1=new Transaction(200,"deposit");
$trans1->gettransdetails();



// echo "<hr><hr>";
// $savings = new SavingsAccount(5000, 5); 
// $current = new CurrentAccount(5000, 2000);

// // echo "Savings Balance: " . $savings->getBalance() . "<br>";  // check eextends destructor call
// echo "Interest: " . $savings->calculateInterest() .$savings->getaccdetails(). "<br><br>";

// // echo "Current Balance: " . $current->getBalance() . PHP_EOL;
// echo "Overdraft Limit: " . $current->getlimit() . "<br>";


?>
