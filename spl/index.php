<?php
error_reporting(E_ALL);

spl_autoload_register(function($className){
    var_dump('1: '.$className);
    $file = __DIR__.DIRECTORY_SEPARATOR.strtolower($className).'.php';
    if(file_exists($file)){
        require_once $file;
    }
});

spl_autoload_register(function($className){
    var_dump('2: '.$className);
    $file = __DIR__.DIRECTORY_SEPARATOR.strtolower($className).'.class.php';
    if(file_exists($file)){
        require_once $file;
    }
});

var_dump(spl_autoload_functions());

//echo 'Call SPL (Child)<br/>', PHP_EOL;
//spl_autoload_call('Child');
//echo 'Call SPL (Parrent)<br/>', PHP_EOL;
//spl_autoload_call('Parrent');

echo 'Create class Child<br/>', PHP_EOL;
$a = new Child();

echo 'Create class Parrent<br/>', PHP_EOL;
$b = new Parrent();

echo 'Call SPL (Child)<br/>', PHP_EOL;
spl_autoload_call('Child');
echo 'Call SPL (Parrent)<br/>', PHP_EOL;
spl_autoload_call('Parrent');

