<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        // A::foo();//non static method cannot be accessed statically

    }
}

$a = new A();
$a->foo();

// A::foo();//non static method cannot be accessed statically

$b = new B();
$b->bar();

// B::bar();//non static method cannot be accessed statically




//readonly property
class Order {
    public function __construct(
        public readonly int $id,
        public readonly float $amount
    ) {}
}

echo "<br><hr>";
$ord = new Order(113,2000);
// $ord->id=119;

readonly class readd{
    public  readonly  int $bar;
}

readonly class ParentClass {
    public int $x;
}

readonly class ChildClass extends ParentClass { 
    public int $y;
}
?>