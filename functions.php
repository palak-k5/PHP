<?php  declare(strict_types=1);

function operation(int $num, callable $operation) : int
{

        // echo __FUNCTION__;
    return $operation($num);
}

$doublee = function(int $n): int
{
        echo __FUNCTION__;

    return $n * 2;
    
};

$addnum = fn(int $n): int =>
    
$n + 5;


function multiply(int $x): callable
{
    return function(int $n) use ($x): int. ///closuree
    {
        echo __FUNCTION__;

        return $n * $x;
    };
}

$triple = multiply(44);

echo operation(10, $doublee);   
echo "<br>";

echo operation(10, $addnum);  
echo "<br>";

echo operation(10, $triple);   


echo __DIR__; //doesnt includes fiule naame
echo "<br>";

echo "<br>";
echo __CLASS__;
echo "<br>";
echo __FILE__; //path along with fie naame is reeturneed
echo "<br>";

echo __LINE__; //currrent line in file 

