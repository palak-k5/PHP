
<?php
require "db.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['username'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    if(empty($user) || empty($email) || empty($password)) {
        echo " Please fill all fields";
    } else {

        $filename = $_FILES['profile']['name'];
        $tmpname = $_FILES['profile']['tmp_name'];

        if(!empty($filename)) {
            $folder = "uploads/" . $filename;

            if(move_uploaded_file($tmpname, $folder)) {
                echo "Image uploaded: $folder <br>";
            } else {
                echo "upload failed <br>";
                $folder = "";
            }
        } 
        //assests folder
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, profile) 
                VALUES ('$user', '$email', '$hash', '$folder')";

        if($conn->query($sql)) {
            // echo "User registered  <br>";
            header("Location: login.php");
            exit();
        } else {
            echo " Error: " . $conn->error;
        }
    }
}
?>


<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-sm p-4" style="width: 350px;">
        
        <h4 class="text-center mb-3">Register</h4>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                Username
                <input type="text" name="username" class="form-control">
            </div>

            <div class="mb-3">
                Email
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mb-3">
               Password
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                Profile 
                <input type="file" name="profile" class="form-control">
            </div>  

            <button type="submit" class="btn btn-success w-100">Register</button>

        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>