<?php

require 'products.php';
require 'testing.php';


$product = new Product\Item();
$product->show();

echo "<br>";

$test = new Test\Item();
$test->show();




// use Product\Item as ProductItem;
// use Test\Item as TestItem;

// $p = new ProductItem();
// $p->show();

// echo "<br>";

// $t = new TestItem();
// $t->show();

Product\show();

echo "<br>";

Test\show();