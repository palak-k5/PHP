<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Base{
    public static $count=0;
    public $name;

    public function __construct($name)
    {
        $this->name=$name;
        self::$count++;
    }

    public static function getcount()
    {
        return self::$count;
    }
    public function showname()
    {
        echo "Name using this ". $this->name ."<br>";

        
    }

    final public function fix()
    {
        echo "this methodd cannot be overridden<br>";
    }

}

class child extends Base{
 
    public function showboth() {
        echo "Using this: " . $this->name . "<br>";

        echo "Using self count: " . self::$count . "<br>";
    }

    // public function fix() {
    //     echo "HELLO";
    // }
}


final class FinalClass {
    public function sayHello() {
        echo "Hello from final class<br>";
    }
}

// class child2 extends FinalClass{

// }


$obj1 = new Base("Palak");
$obj2 = new Child("aastha");

$obj1->showName();
$obj2->showboth();

echo "Total objects: " . Base::getCount() . "<br>";

$final = new FinalClass();
$final->sayHello();



// class base2{
//     public  $count=0;
//     public function increment()
//     { 
//         $this->count++;
//     }
//     public function display()
//     {
//         // die($count);
//         echo $this->count;
//     }
    
// }

// $object=new base2();
// $object->increment();
// $object->display();//1

// $object2=new base2();
// $object2->increment();

// $object2->display();//2
?>