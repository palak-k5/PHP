<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

// class User {
//     public function __construct() {
//         echo "Public constructor";
//     }
// }

// $obj = new User(); 


class User {
    protected function __construct() {
        echo "Protected constructor";
    }
}

class admin extends User {
    public function create() {
        return new User(); 
    }
}
//used for inheritance control

// class User {
//     private function __construct() {
//         echo "Private constructor";
//     }

//     public static function create() {
//         return new User(); //worrks
//     }
// }

// $obj = User::create();
// // $obj = new User(); 
// //singleton pattern(only one objectt allowed )



//giving default values to class variables through constructor

class demo{
    public $a,$b;
    public $normalize;

    function __construct($geta,$getb,$getnormalize=1)
    {
        $this->a=$geta;
        $this->b=$getb;
        $this->normalize=$getnormalize;
    }
    public function overallsum()
    {
        echo "normalized sum is = "." " .$this->a + $this->b +  $this->normalize;
    }
}

$demoobj=new demo(2,3);
$demoobj->overallsum();

?>