<?php
function __autoload($class){
    $file = __DIR__ . '/websocket/' .pathinfo($class, PATHINFO_FILENAME).'.php';
    $file1 = __DIR__ . '/'.pathinfo($class, PATHINFO_FILENAME).'.php';
    if(file_exists($file)){
        require_once $file;
    }
    elseif(file_exists($file1)){
        require_once $file1;
    }
    else{
        throw new Exception('Class "'.$class.'" not found ('.$file.')');
    }
}