<?php

//we will get verified data
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        echo "Welcome"." ".$_SESSION['username']."<br>";
        $_SESSION['password'];
        echo "Remember your password is = ". " ". $_SESSION['password']."<br>";
        echo session_save_path();
    }
else
    {
    echo "login to continue";
    }

?>

// register->image,doc