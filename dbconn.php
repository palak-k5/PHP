<?php

$servername = "localhost";

$username = "root";

$password = "Dbpass@26";

$conn = new mysqli($servername, 
            $username, $password);

if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
} 

$sql = "CREATE DATABASE demoDB2";
if ($conn->query($sql) === TRUE) {
    echo "Database with name demoDB";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>