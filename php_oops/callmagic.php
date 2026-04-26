<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

class student{
    private $firstname;
    private $lastname;

    private function setname($fn,$ln)
    {
        $this->firstname=$fn;
        $this->lastname=$ln;
    }
    public function __call($method, $args){ //ttwo compulsry aarguments
        echo "this is private or non existing method";
        // print_r($args);
    }
}

$obj=new student();
echo $obj->setname("Palak","Kumrawat");
echo $obj->personal();

?>
