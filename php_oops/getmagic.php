<?php


class Student {
    private $data = [
        "name" => "Palak",
        "course" => "BTech"
    ];

    public function __get($key) {
        //one param compulsary
        // echo "this is private property or non existing ";
        if(array_key_exists($key,$this->data))
            {
                return $this->data[$key];
            }
        else{
            return "key no defined";
        }
        
    }
}

$obj = new Student();

echo $obj->name;    //directly accessing key
echo $obj->course;  
echo $obj->age;
?>
