<?php
require "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "admin";
$password = "1234";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql)) {
    echo "User created successfully <br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
} else {
    echo "Error: " . $conn->error;
}
?>