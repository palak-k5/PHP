<?php
require "db.php";
 error_reporting(E_ALL);
ini_set('display_errors', 1);
$id = $_GET['id'];
echo $id;
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>

<div class="container  mt-5 mx-auto w-50 p-3">
    <div class="card shadow">
        <div class="card-header bg-primary-subtle text-secondarry-subtle text-center">
            <h4>User Registration Form</h4>
        </div>

        <div class="card-body">
            <form action="update.php" method="POST">
    <!--?php echo $_GET['id']?> -->

                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" required >

                <div class="mb-3">
                    Name:
                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required >
                </div>

                <div class="mb-3">
                    Email:
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="mb-3">
                    Age:
                    <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
                </div>

                <div class="mb-3">
                    Phone Number:
                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>

                <div class="mb-3">
                    City:
                    <input type="text" name="city" class="form-control"  value="<?php echo $row['city']; ?>" required>
                </div>

                <div class="mb-3">
                    Role:
                    <input type="text" name="role" class="form-control"  value="<?php echo $row['role']; ?>" required>
                </div>

                <button  class="btn btn-success w-100">Update</button>

            </form>
        </div>
    </div>
</div>
</body>
</html>