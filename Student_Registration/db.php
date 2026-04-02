<?php
    $server_name="localhost";
    $user_name="root";
    $password="Dbpass@26";
    $conn=new mysqli( $server_name,$user_name,$password,"Student");

    if ($conn->connect_error) 
    {
        die("Connection failure: " . $conn->connect_error);
    } 
    else 
    {
        echo "nothing in connect-error"  . $conn->connect_error ."<br>";
        echo "connection successfull"."<br>";
    }
?>