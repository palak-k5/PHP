<?php
require "db.php";
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM cart WHERE user_id = $user_id";

if($conn->query($sql))
{
    header("Location: index.php");
    exit();
} 
else 
{
    echo "cannot clear cart";
}
?>
?>