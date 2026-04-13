<?php
require "db.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id=$user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg mx-auto" style="max-width: 400px;">
        <div class="card-body text-center">

            <img src="<?php echo $user['profile']; ?>" 
                 class="rounded-circle mb-3 border" 
                 width="120" height="120" 
                 style="object-fit: cover;">

            <h3 class="card-title">
                Hello, <?php echo $user['username']; ?> 
            </h3>

            <p class="text-muted">
                <?php echo $user['email']; ?>
            </p>

            <hr>

            <div class="d-grid gap-2">
                <a href="logout.php" class="btn btn-danger">
                    Logout
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>