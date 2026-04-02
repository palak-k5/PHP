<?php

    require "db.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $id = $_GET['id'];

    $conn->query("DELETE FROM users WHERE id=$id");

    header("Location: display.php");
?>