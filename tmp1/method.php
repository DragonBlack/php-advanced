<?php

/**
 * link http://php.net/manual/ru/class.reflectionmethod.php
 */
class MyClass {
    public $test = 10;
    private $_lock = false;

    protected function setValue($val){
        $this->_lock = $val;
    }
}

$obj = new MyClass();
var_dump($obj);
$a = new ReflectionMethod($obj, 'setValue');

var_dump($a);
$a->setAccessible(true);
$a->invoke($obj, 100500);
var_dump($obj);