<?php
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