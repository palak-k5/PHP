<?php
session_start();

if(isset($_GET['item']))
    {
        $_SESSION['cart'][]=$_GET['item'];
    }
    header("Location: index.php");
?>