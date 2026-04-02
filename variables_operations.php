<?php



$a = "fullname";   // this stores a variable name
$$a = "Palakkumrawat"; // creates $name

echo $fullname; 


echo ("Palak Kumrawat <br/>");
echo ("I am learning PHP <br/>");
echo "This is my first PHP code <br/>";

echo $name;
//variable not defined yet hence it will give an error

$name="Palak Kumrawat";
$age=21;
echo "My name is $name and I am " .  $age . " years old" . "<br/>";



$age++;

echo "My age this year will be " . $age . "<br/>";


$num = 22;
$n = &$num;

$n = 57;

echo $num; 
echo $a; 

?>
