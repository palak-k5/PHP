<?php


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

?>