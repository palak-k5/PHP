<?php


interface A{
    function hello($n); //no need to mention access specifier
    // protected $a; //caannot do this
}
interface C{
    function hi($n);
    function bye();
}

class B implements A,C{
    public function hello($n)
    {
        echo "Hello ".$n;
    }
     public function hi($n)
    {
        echo "Hi ".$n;
    }
     public function bye()
    {
        echo "bye ".$n;
    }
}
$obj=new B();
$obj->hello("Palak");
$obj->hi("Palak");
$obj->bye();


?>