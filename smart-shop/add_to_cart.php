<?php
require "db.php";
session_start();

if(!isset($_SESSION['user']))
    {
    header("Location: login.php");
    }
if(isset($_GET['item']))
    {
        // $_SESSION['cart'][]=$_GET['item'];

        $item=$_GET['item'];
        $user_id=$_SESSION['user_id'];
        $sql="INSERT INTO cart ( item_name, user_id) VALUES ('$item' , '$user_id')";
        $conn->query($sql);
        
        // echo "inserted";
        header("Location: index.php");
        exit();

    }
?>