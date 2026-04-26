<?php

spl_autoload_register(function ($class) {
    require $class . '.php';
});



$user = new User();
$user->sayHello();

echo "<br>";


function __autoload($class) {
    // Convert namespace to path
    $class = str_replace("\\", "/", $class);

    require $class . ".php";
}

// No require used manually

$obj = new Product\Item();
$obj->show();