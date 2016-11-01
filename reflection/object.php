<?php

/**
 * Class Singletone
 * Это описание класса Singletone
 */

class Singletone {
    private static $_instance;
    public $test;

    public static function instance(){
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){}
    private function __clone(){}
    private function __sleep(){}
    private function __wakeup(){}
}

$a = Singletone::instance();
$ref = new ReflectionObject($a);
$a->test = 10;

$b = $ref->newInstanceWithoutConstructor();
$b->test = 50;
var_dump($a, $b);
echo nl2br($ref->getDocComment()), '<br/>';