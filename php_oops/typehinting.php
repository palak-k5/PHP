<?php

function add(int $a, int $b) {
    return $a + $b;
}

echo add(2, 3);   
echo add("2", 3);//automaticc



class school{
    public function getnames(student $names)
    {
       foreach($names->Names() as $name)
        {
            echo $name."<br>";
        }
    }
}
class student{
    public function Names()
    {
        return ["Ram","Shyam","Palak"];
    }
}

class library{

}
$lib=new library();
$stu=new student();
$sch=new school();

$sch->getNames($stu);
?>
