<?php

class Calculator {
    private $value = 0;

    public function add($num) {
        $this->value += $num;
        return $this; 
    }
    public function multiply($num) {
        $this->value *= $num;
        return $this; 
    }
    public function result() {
        return $this->value;
    }
}

$calc = new Calculator();

echo $calc->add(5)->multiply(2)->result();