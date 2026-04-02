<?php
require "db.php";

$sql = "SELECT * from users";
$result = $conn->query($sql);
// echo "<pre>";
// print_r ($result);
// print_r($result->fetch_assoc());

// die;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary-subtle text-center">
            <h4>User List</h4>
        </div>

        <div class="card-body">

<?php

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped table-hover text-center'>
    <thead class='table-dark'>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Phone</th>
        <th>City</th>
        <th>Role</th>
        <th colspan='2'>Action</th>
    </tr>
    </thead>
    <tbody>";
    //forreach loop try
    while($row = $result->fetch_assoc()) {
        echo "<tr>  
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['age']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['city']."</td>
            <td>".$row['role']."</td>
            <td><a href='edit.php?id=".$row['id']."' class='btn btn-sm btn-warning'>Edit</a></td>
            
            <td><a href='delete.php?id=".$row['id']."' class='btn btn-sm btn-danger'>Delete</a></td>
        </tr>";
    }
//encrypt decrypt ids
    echo "</tbody></table>";
} else {
    echo "<p class='text-center text-danger'>No records found</p>";
}
?>

        </div>
    </div>

</div>

</body>
</html>