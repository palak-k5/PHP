<?php
session_start();


// echo "Logging out<br>";
session_unset();
session_destroy();
setcookie("token","",time()-3600,"/");
header("Location: login.php");
exit();
?>