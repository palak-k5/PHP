<?php
    require "db.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // echo $_POST['name'];
    $name= $_POST['name'] ?? "";
    $email= $_POST['email'] ?? "";
    $age= $_POST['age'] ?? "";
    $phone= $_POST['phone'] ?? "";
    $city=$_POST['city'] ?? "";
    $role=$_POST['role'] ?? "";

    $sql = "INSERT INTO users (name,email,age,phone,city,role)
                        VALUES ( '$name', '$email', $age, '$phone', '$city', '$role')";

                if ($conn->query($sql) === TRUE) 
                {
                    // echo "User inserted <br>";
                    header("Location: display.php");
                    exit;

                } 
                else 
                {
                    echo "Cannot Insert user ". "<br>" . $conn->error ;
                }


?>