<?php
session_start();


// echo "Logging out<br>";
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>