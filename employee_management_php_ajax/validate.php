<?php
$field = $_POST['field'];
$value = $_POST['value'];
// echo $field
$error = "";

if ($field == "name") {
    if (empty($value)) {
        $error = "Name is required";
    }
    
} 
elseif ($field == "email") {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email";
    }

} 
elseif ($field == "age") {
    if (!is_numeric($value) || $value <= 0) {
        $error = "Invalid age";
    }

} 
elseif ($field == "phone") {
    if (!preg_match("/^[0-9]{10}$/", $value)) {
        $error = "Phone must be 10 digits";
    }

} 
elseif ($field == "city") {
    if (empty($value)) {
        $error = "City required";
    }
}


echo $error;

?>
