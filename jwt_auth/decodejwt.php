<?php

require "jwt_helper.php";

$token=$_COOKIE['token']??'';
$decoded=verifyJWT($token);
echo "<pre>";
print_r($decoded);

?>