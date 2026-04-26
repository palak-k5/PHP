<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// echo "JWT LOADED"; exit;
$secret_key = "12345678901234567890123456789012"; 

function generateJWT($user)
{
    global $secret_key;
    $payload=[
        "iat"=>time(),
        "exp"=>time()+3600,
        "data"=>$user

    ];
    return JWT::encode($payload,$secret_key,'HS256');
}

function verifyJWT($token)
{
    global $secret_key;
    try{
        return JWT::decode($token, new Key($secret_key,'HS256'));

    }
    catch(Exception $e){
        return null;
    }
}

?>
