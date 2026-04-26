<?php
trait hello{
    public function sayhello()
    {
        echo "Hello from trait";
        echo "<br><hr>";
    }
   
}
class base{
    public function sayhello()
    {
        echo "Hello fom base class\n";
                echo "<br><hr>";

    }

}
class child extends base{
    use hello;
    public  function sayhello()
    {
        echo "Heello from child class";
        echo "<br><hr>";

    }
}
$obj=new child();
$obj->sayhello();



?>