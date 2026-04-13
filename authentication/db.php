<?php

    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    $server="localhost";
    $username="root";
    $password="Dbpass@26";
    $conn= new mysqli($server,$username,$password,"auth");

    if($conn->connect_error)
        {
            die("Connection Failure ". $conn->connect_error);
        }
       
?>  