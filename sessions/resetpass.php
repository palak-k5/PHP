<?php


session_start();
$_SESSION['password']=$_POST['password'];

?>
<!DOCTYPE html>
<html >
<head>
    <title>reset password</title>
</head>
<body>
   <form method="POST">
    Enter new password:
    <input type="text" name="password">
    <button type="submit">Save</button>
</form>
</body>
</html>