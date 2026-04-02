<?php
$a = 100;

function test() {
    $b=10;
    echo $b; //local variable
    echo "<br>";
    echo $a;

}



test();
echo $b;
echo "<br>";
echo $a;

$c = 5;
$d = 10;

function add() {
    global $c, $d;//way to access global variable inside functtion
    $d = $c + $d;
}

add();
echo "<br/>";
echo $d; // 15




// accessing using array of all global varibless



function add() {
    $GLOBALS['c'] = $GLOBALS['d'] + $GLOBALS['c'];
}

add();
echo $c; 


?>