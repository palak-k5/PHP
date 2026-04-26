<?php
trait hello{
    protected function sayhello()
    {
        echo "Hello eveeryone";
    }
    public function bye()
    {
        echo "Bye";
    }
}
trait hey{
     public function sayhey()
    {
        echo "Hey eveeryone";
    }
    public function bye()
    {
        echo "Bye bye";
    }
}
class base{
    use hello,hey{
        hello::sayhello as public newhello;
        hello::bye insteadof hey;
        hey::bye as bye2;  ///now can use bboth 
    }

}
$obj=new base();
$obj->newhello();
$obj->bye();
$obj->bye2()
;


?>