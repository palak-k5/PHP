<?php

class SimpleClass{
    public $var ='default value';

    public function displayVar()
    {
        echo $this->var;
        echo get_class($this);

    }

}
$obj=new SimpleClass();
$obj->displayVar();
echo "<br>";
// echo get_class($obj);


//scope resolution operator and static keyword


class MyClass{
    const constant=1.414;
    static $props= ['order'=>'mammal'];

}
$object=new MyClass();


class ChildClass extends MyClass{

    public static $staticvar='static var';
    public static function statfun()
    {
        echo parent::constant ."\n";
        echo self::$staticvar . "\n";
    }
}
echo MyClass::constant;

ChildClass::statfun(); //calling staticc function direectly






//calling parents method
class MyClass2{
    protected function myFunc()
    {
        echo "MyClas2::myFunc()\n";
    }
}

class OtherClass2 extends MyClass2{
    public function myFunc()
    {
        // parent::myFunc();
        echo "OtherClass2::myFunc()\n";
    }
}
$objj=new OtherClass2();
$objj->myFunc();





//self and this in inheritance

class parentClass2{
    function test()
    {
        self::who();
        $this->who();  //doesnt matters if its written here it will call the child class overridden method only if exisists
    }
    function who()
    {
        echo "parent";

    }
}
class ChildClass2 extends parentClass2
{
    // function who()
    // {
    //     echo "child";

    // }
}

$newobj=new ChildClass2();
$newobj->test();


class DefaultClass{
    public $a;
    public function fun()
    {
        echo "lets see what comes in variable a"." ".$a;
    }
}
$defobj=new DefaultClass();
echo "<br><hr>";
// echo var_dump($defobj->$a); //null
// $defobj->fun();








?>