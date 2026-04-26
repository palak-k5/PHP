<?php
require "db.php";

$id    = $_POST['id'] ?? ""; 
$name  = $_POST['name']?? "";
$email = $_POST['email']?? "";
$age   = $_POST['age']?? "";
$phone = $_POST['phone']?? "";
$city  = $_POST['city'] ?? "";
$roles = $_POST['roles'] ?? [];

$errors = [];

if (empty($name))                               
    $errors[] = "Name is required";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    $errors[] = "Valid email is required";
if (!is_numeric($age) || $age <= 0)            
    $errors[] = "Valid age is required";
if (!preg_match("/^[0-9]{10}$/", $phone))   
    $errors[] = "Phone must be 10 digits";
if (empty($city))                               
    $errors[] = "City is required";
if (empty($roles))                              
    $errors[] = "At least one role must be selected";
if (!empty($errors)) {
    echo implode("<br>", $errors);
    exit;
}

$update = "UPDATE employees SET
                name='$name',
                email='$email',
                age='$age',
                phone='$phone',
                city='$city'
            WHERE id=$id";

if ($conn->query($update) === TRUE) {
    $conn->query("DELETE FROM employee_roles WHERE emp_id=$id");
    foreach ($roles as $role_id) {
        $conn->query("INSERT INTO employee_roles (emp_id, role_id) VALUES ($id, $role_id)");
    }
    echo "ok";
} else {
    echo "Cannot update employee: " . $conn->error;
}
?>