<?php

echo "<h2>Demo</h2>";

$a = 10;            
$b = 5.5;           
$c = "20";          
$d = true;          
$e = [1, 2, 3];     
$f = null;          

echo "<h3>Data Types</h3>";
var_dump($a, $b, $c, $d, $e, $f);



echo "<h3>Arithmetic Operators</h3>";
echo $a + $b . "<br>";
echo $a - 2 . "<br>";
echo $a * 2 . "<br>";
echo $a / 2 . "<br>";
echo $a % 3 . "<br>";
echo $a ** 2 . "<br>";


echo "<h3>Assignment Operators</h3>";
$x = 10;
$x += 5;
echo $x . "<br>";

$x -= 3;
echo $x . "<br>";

$x *= 2;
echo $x . "<br>";

$x /= 4;
echo $x . "<br>";


echo "<h3>Comparison Operators</h3>";

$y = 10;
$z = "10";

var_dump($y == $z);
var_dump($y === $z);
var_dump($y != 5);
var_dump($y > 5);
var_dump($y < 20);



echo "<h3>Logical Operators</h3>";

$p = 20;
$q = true;

if ($p >= 18 && $q) {
    echo "Allowed<br>";
}

if ($p < 18 || $q) {
    echo "Partial Condition True<br>";
}

if (!$q) {
    echo "No ID<br>";
}



echo "<h3>String Operators</h3>";

$m = "Hello";
$n = "World";

echo $m . " " . $n . "<br>";

$m .= " PHP";
echo $m . "<br>";



echo "<h3>Array Operators</h3>";

$r = ["a" => 1, "b" => 2];
$s = ["b" => 3, "c" => 4];

$t = $r + $s;
print_r($t);


echo "<h3>Conditionals</h3>";

$u = 75;

if ($u >= 90) {
    echo "Grade A<br>";
} elseif ($u >= 70) {
    echo "Grade B<br>";
} else {
    echo "Grade C<br>";
}

$v = "Monday";

switch ($v) {
    case "Monday":
        echo "Start of week<br>";
        break;
    case "Friday":
        echo "Weekend <br>";
        break;
    default:
        echo "Normal br>";
}

echo "<h3>Ternary Operator</h3>";

$w = ($u >= 50) ? "Pass" : "Fail";
echo $w . "<br>";

?>