<?php

//late static binding 


class base{
    protected static $name="Parent class value";
    public function show()
    {
        echo static::$name;
        echo "<br><hr>";
        echo self::$name;

    }
}

class derived extends base{
    protected static $name="Child Class value";

}
$test=new derived();
$test->show();

$test2=new derived();

//In PHP, when you use self::, 
// it always refers to the class where it is written, not the class that called it.
//this breaks inheritance flexibility.
//forrr compile time polymorphism

// Late Static Binding =“Use the class that called the method, 
// not the class where it was defined.”
?>