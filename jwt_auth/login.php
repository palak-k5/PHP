<?php
// echo "STEP 1"; 

require "db.php";
// echo "STEP 2";

require "jwt_helper.php";
// echo "STEP 3"; 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
// echo "<pre>";
//     die("check");
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
} 

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['username'] ;
    $password = $_POST['password'];

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    if(empty($user) || empty($password)) {
        echo " Please fill all fields";
    } 
    else {

        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = $conn->query($sql);

        if($result && $result->num_rows > 0) {

            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password'])) {

                $_SESSION['user'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];  
               
                $payload = ["id" => $row['id'],
                            "username" => $row['username']];
                $token = generateJWT($payload);
                // Store in cookie
                setcookie("token", $token, time() + 3600, "/", "", false, true);

                // echo "Login success <br>";
                header("Location: index.php");
                exit();

            } else {
                echo "Wrong password";
            }

        } else {
            echo "User not found";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-sm p-4" style="width: 350px;">
        
        <h4 class="text-center mb-3">Login</h4>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class ="text-center mt-3">
                 <p>Don't have an account ? <a href="register.php"> Register here</a></p>
            </div>
        </form>

    </div>

</div>

</body>
</html>



