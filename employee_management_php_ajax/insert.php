<?php
require "db.php";

$name  = $_POST['name'];
$email = $_POST['email'];
$age   = $_POST['age'];
$phone = $_POST['phone'];
$city  = $_POST['city'];
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

$sql = "INSERT INTO employees (name, email, age, phone, city)
        VALUES ('$name', '$email', $age, '$phone', '$city')";

if ($conn->query($sql) === TRUE) {
    $emp_id = $conn->insert_id;
    foreach ($roles as $role_id) {
        $conn->query("INSERT INTO employee_roles (emp_id, role_id) VALUES ($emp_id, $role_id)");
    }
    echo "ok";
} else {
    echo "Error: " . $conn->error;
}
?>  