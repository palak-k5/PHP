<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



// DB Connection
$host = "localhost";
$user = "root";
$password = "Dbpass@26";
$dbname = "test_db";

$conn = new mysqli($host, $user, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "CREATE DATABASE if not exists test_db";
// if ($conn->query($sql) === TRUE) {
//     echo "Database with name test_db";
// } else {
//     echo "Error: " . $conn->error;
// }



$table="CREATE TABLE if not exists users (
    name varchar(200),
    email varchar(200)
)";

if ($conn->query($table) === TRUE) {
    echo "Table created"."<br>";
}


// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Simple insert query
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Data inserted successfully</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Form</title>
</head>
<body>

<h2>User Form</h2>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>