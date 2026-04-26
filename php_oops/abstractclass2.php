<?php

    abstract class Abstractclass{
        abstract protected function prefixName($name);
    }
class concreteclass extends AbstractClass{
    public function prefixName($name,$lname="")//optional paarameterrs are only allowed
    {
        return $name." ".$lname;
    }
}
$obj=new ConcreteClass();
echo $obj->prefixName("Palak","Kumrawat");
?>

