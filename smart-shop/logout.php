<?php
session_start();


if(!isset($_SESSION['user']))
    {
    header("Location: login.php");
    }
// session_unset();

session_destroy();
// echo "You have been logged out <br> ";
header("Location: login.php");  
?>