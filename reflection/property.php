<?php

/**
 * link http://php.net/manual/ru/class.reflectionproperty.php
 */
class MyClass {
    public $test = 10;
    private $_lock = false;

    protected function setValue($val){
        $this->_lock = $val;
    }
}

$a = new ReflectionProperty('MyClass', '_lock');
$obj = new MyClass();
var_dump($a);
$a->setAccessible(true);
var_dump($a->getValue($obj));
$a->setValue($obj, 100500);
var_dump($a->getValue($obj));
var_dump($obj);