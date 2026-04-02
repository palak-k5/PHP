<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $server_name="localhost";
    $user_name="root";
    $password="Dbpass@26";
    $conn=new mysqli( $server_name,$user_name,$password,"form");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'] ?? "";
        $city = $_POST['city'];

        $sql = "INSERT INTO users (name, email, password, gender, city)
                VALUES ('$name', '$email', '$password', '$gender', '$city')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data inserted');</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
?> 

<!DOCTYPE html>
<html>
<head>
    <title> Form</title>
</head>
<body>

<h2>User Form</h2>

<form method="POST">
    
    Name: <br>
    <input type="text" name="name" ><br><br>

    Email: <br>
    <input type="email" name="email" ><br><br>

    Password: <br>
    <input type="password" name="password"><br><br>

    Gender: <br>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    City: <br>
    <select name="city">
        <option value="Ahmedabad">Ahmedabad</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Delhi">Indore</option>
    </select>
    <br><br>

    <button type="submit" name="submit">Submit</button>

</form>

</body>
</html>