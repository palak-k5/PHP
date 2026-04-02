<?php
require "db.php";
 error_reporting(E_ALL);
ini_set('display_errors', 1);

// $id = $_GET['id'];
$id= $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$role = $_POST['role'];
echo $id;
// echo $name;

$update= " UPDATE users set name='$name',
email='$email',
age='$age',
phone='$phone',
city='$city',
role='$role'
WHERE id=$id";
if ($conn->query($update) === TRUE) 
{
    echo "user updated successfully";
    header("Location: display.php");
    exit;
}
else
{
    echo "cannot update users". "<br>" . $conn->error ;
}
?>