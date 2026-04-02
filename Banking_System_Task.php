<?php
//if connecting to database
//tables i need to create 
//bank(bank_id , bank name ,totalusers) 
//no need of total users aas it is deerrived  attribbutee , can be calculated
//accounts(acc_no,user_id,balance,bank_id)
//transactions (transaction_id,transaction_type, amount, acc_no)//bank_id not required heree can be connected using joins
//creeate a different user table and then conneect that table with accounts table as a single user can have multiple accounts
//user(user_id,mobile_no,bank)x 

$bank=[
    "accounts"=>[
        [
            "id"=>1,
            "name"=>"Palak",
            "balance"=>50000,
            "transactions"=>[
                [
                    "type"=>"deposit",
                    "amount"=>2000
                 ],
                  [
                    "type"=>"withdraw",
                    "amount"=>3000
                 ],
                  [    
                    "type"=>"withdraw",
                    "amount"=>300

                ],
            ]
        ],
        [
           "id"=>2,
            "name"=>"Shreyas",
            "balance"=>25000,
            "transactions"=>[
                [
                    "type"=>"withdraw",
                    "amount"=>2500
                ],
                [
                    "type"=>"withdraw",
                    "amount"=>3000
                ],
            ] 
        ],
        [
            "id"=>3,
            "name"=>"Punit",
            "balance"=>30000,
            "transactions"=>[
                [
                    "type"=>"deposit",
                    "amount"=>2500
                ],
                [
                    "type"=>"deposit",
                    "amount"=>3000
                ],
                [
                    "type"=>"deposit",
                    "amount"=>3000
                ],
                [
                    "type"=>"withdraw",
                    "amount"=>1000
                ],


            ] 
        ],
        [
           "id"=>4,
            "name"=>"Aryan",
            "balance"=>75000,
            "transactions"=>[
                [
                    "type"=>"withdraw",
                    "amount"=>2500
                ],
                  [   
                    "type"=>"withdraw",
                    "amount"=>3000
                ],
                [
                    "type"=>"withdraw",
                    "amount"=>3000
                ],
                [
                    "type"=>"withdraw",
                    "amount"=>3000
                ],
                [
                    "type"=>"deposit",
                    "amount"=>15000
                ],

            ] 
        ]
    ],
    "meta"=>[
        "bank_name"=>"SBI",
        "total"=>4
    ]
];


// find acc by id
function findAccount(&$bank, $id) {
    foreach ($bank['accounts'] as $acc) {
        if ($acc['id'] == $id) return $acc;
    }
    return null;
}



function displayBank($bank) {
    echo "Bank: ".$bank['meta']['bank_name'];
    echo "<br/><br/>";

    foreach ($bank['accounts'] as $acc) {
        echo "Account ID: {$acc['id']} | Name: {$acc['name']} | Balance: {$acc['balance']}";
        echo "<br/>";

        foreach ($acc['transactions'] as $t) {
            echo " - {$t['type']} : {$t['amount']}";
            echo "<br/>";
        }

        echo "<br/>";
    }
}


// Displaaay Full bank data
echo "Bank: ".$bank['meta']['bank_name'];
echo "<br/>";

foreach ($bank['accounts'] as $acc) {
    echo "Account ID: {$acc['id']} | Name: {$acc['name']} | Balance: {$acc['balance']}";
    echo "<br/>";
        foreach ($acc['transactions'] as $t) {
        echo "   - {$t['type']} : {$t['amount']}";
        echo "<br/>";
    }
}




$acc = findAccount($bank, 1);
if ($acc) {
    echo "Account Found : {$acc['name']} | Balance: {$acc['balance']}\n\n";
}


//add new acc
$bank['accounts'][] = [
    "id" => 5,
    "name" => "manishaa",
    "balance" => 30000,
    "transactions" => []
];

$bank['meta']['total']++;



//depositt using map
$bank['accounts'] = array_map(function($acc){
    if ($acc['id']==3) {
           $acc['balance'] += 11230;
         $acc['transactions'][] = ["type"=>"deposit","amount"=>1000];
    }
     return $acc;
}, $bank['accounts']);

//withhdraw
$bank['accounts'] = array_map(function($acc){
    if ($acc['id']==1 && $acc['balance']>=1320) {
            $acc['balance'] -= 1320;
         $acc['transactions'][] = ["type"=>"withdraw","amount"=>1320];
    }
      return $acc;
}, $bank['accounts']);

displayBank($bank);


?>




<!-- Banking System Implementation
Advanced Banking System (Nested Arrays Assignment)
Objective
Build a mini banking backend using nested arrays:
• Account management
• Transactions (deposit, withdraw, transfer)
• Analytics & filtering
Data Structure (MANDATORY)

$bank = [
    "accounts" => [
        [
            "id" => 1,
            "name" => "A",
            "balance" => 5000,
            "transactions" => [
                ["type"=>"deposit", "amount"=>2000],
                ["type"=>"withdraw", "amount"=>500],
            ]
        ],
        [
            "id" => 2,
            "name" => "B",
            "balance" => 10000,
            "transactions" => [
                ["type"=>"deposit", "amount"=>3000],
            ]
        ],
    ],
    "meta" => [
        "bank_name" => "ABC Bank",
        "total_customers" => 2
    ]
];

⚙️ Tasks
1. Display Full Bank Data
• Print bank name
• Loop through all accounts
• Show transactions per account
2. Find Account by ID
• Search and return account details
3. Add New Account
• Add a new account dynamically
4. Deposit Money
• Increase balance
• Add transaction inside account
5. Withdraw Money
• Check balance before withdrawal
• Deduct amount
• Store transaction
6. Transfer Money
• Deduct from sender
• Add to receiver
• Record transaction in both accounts
7. Flatten Transactions
Convert nested transactions into:

$allTransactions = [
    ["account_id"=>1, "type"=>"deposit", "amount"=>2000],
];

8. Total Bank Balance
• Calculate total balance of all accounts
9. Filter Accounts
• Accounts with high balance
• Accounts with low balance
10. Sort Accounts
• Sort accounts by balance (descending)
11. Group Transactions by Type

[
  "deposit" => [...],
  "withdraw" => [...]
]

12. Transaction Summary per Account

[
  1 => ["deposit"=>2000, "withdraw"=>500],
  2 => ["deposit"=>3000, "withdraw"=>0]
]

13. Low Balance Detection
• Identify accounts below threshold
14. Add Interest
• Add 5% interest to all accounts
15. Remove Inactive Accounts
• Accounts with no transactions
Advanced Challenges
1. Most Active Account
• Account with highest number of transactions
2. Highest Transaction in Bank
• Find maximum transaction amount
3. Multi-Level Grouping

[
  account_id => [
      "deposit" => [...],
      "withdraw" => [...]
  ]
]

4. Convert to API Response

echo json_encode($bank, JSON_PRETTY_PRINT);

5. Pagination
• Show limited accounts per page
Constraints
• Arrays only (no database)
• No OOP
• Clean structure required -->
