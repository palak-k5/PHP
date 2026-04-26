<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class base{
    public $name="Parent class";
    public function calc($a,$b)
    {
        return $a*$b;
    }
    public final function display()
    {
        echo "<br> final method arre the once hat cannot be overrriden";
        echo "<br><hr>";
    }
}
class derived extends base{
    public $name="child class";
     public function calc($a,$b)
    {
        return parent::calc($a,$b);
        // return $a+$b;
    }
    // public  function display()
    // {
    //     echo "final method arre the once hat cannot be overrriden";
    //     echo "<br><hr>";
    // }

}

$test = new derived();
echo $test->name;
echo $test->calc(5,5);
echo $test->display();
echo "<br><hr>";
echo derived::class;
echo "<br><hr>";


$test2 = new base();
echo $test2->name;
echo $test2->calc(5,5);
echo "<br><hr>";


//exceptioon handling
//oops in mysql
//regex in deep (check website) rege
?>