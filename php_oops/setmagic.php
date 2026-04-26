<?php


class Employee {
    private $salary;

    public function __get($prop)
    {
        echo "this property doesnt exists or is privatte from get "."<br><hr>";
    }
    public function __set($prop, $value) { //ttwo params compulsaary
        // echo "this is private or non existing property";


        if($prop == "salary") {
            if($value >= 0) {
                $this->salary = $value;
            } else {
                echo "Invalid salary";
            }
        }
        else if(!property_exists($this ,$prop)) //object,properrty name as parameter
            {
                
                echo "this is private or non existing property from seet <br><hr>";

            }
    }

    public function getSalary() {
        return $this->salary;
    }
}

$e = new Employee();
$e->salary; //get 
$e->salary = 50000; //set
// echo $e->getSalary();
$e->age=25;
echo $e->age;
?>
