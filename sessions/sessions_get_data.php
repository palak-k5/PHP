<?php

//verify user login info

session_start();



if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        echo "Welcome"." ".$_SESSION['username']."<br>";
        $_SESSION['password'];
        echo "Remember your password is = ". " ". $_SESSION['password']."<br>";
    }
else
    {
    echo "Please login to continue";
    }

?>