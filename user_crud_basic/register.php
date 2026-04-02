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
            <form action="insert.php" method="POST">

                <div class="mb-3">
                    Name:
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    Email:
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    Age:
                    <input type="number" name="age" class="form-control" required>
                </div>

                <div class="mb-3">
                    Phone Number:
                    <input type="text" name="phone" class="form-control" required>

                <div class="mb-3">
                    City:
                    <input type="text" name="city" class="form-control" required>
                </div>

                <div class="mb-3">
                    Role:
                    <input type="text" name="role" class="form-control" required>
                </div>

                <button  class="btn btn-success w-100">Register</button>

            </form>
        </div>
    </div>
</div>
</body>
</html>