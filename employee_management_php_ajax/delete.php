<?php
require "db.php";

$id = $_GET['id'];

if ($conn->query("DELETE FROM employees WHERE id=$id")) 
{
    echo "ok";
} 
else 
{
    echo "Error: " . $conn->error;
}
?>