<?php

/**
 * link http://php.net/manual/ru/class.reflectionclass.php
 */

class MyClass {
    public $test = 10;
    private $_lock = false;

    protected function setValue($val){
        $this->_lock = $val;
    }
}

$a = new ReflectionClass('MyClass');
var_dump($a);
echo '<pre/>';
ReflectionClass::export('MyClass');
echo '</pre>';
var_dump(ReflectionClass::export('MyClass', true));
echo '<br/>';
var_dump($a->getProperties());

var_dump($a->isUserDefined());

var_dump($a->getMethods());
var_dump($a->getMethod('setValue'));
