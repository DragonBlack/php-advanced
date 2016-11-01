<?php
error_reporting(E_ALL);

spl_autoload_extensions('.php,.class.php,/index.php');
spl_autoload_register();

//Возможны проблемы в Linux
$a = new Test();
