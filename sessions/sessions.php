<?php

//verify user login info
//setting super global varibles for now     

session_start();

$_SESSION['username']="Palak";
$_SESSION['password']="abcd";

echo "session saved";
?>  