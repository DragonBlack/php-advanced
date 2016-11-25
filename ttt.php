<?php
$str = '+38(000)111-33-55';
$res = preg_replace('/^(\+\d{1,2}\(\d{3}\))(\d{3}(-\d{2}){2})/', '$2', $str);
echo $res, PHP_EOL;

$str = 'and234skrirdrldfls640945pidrk68787khkjh';

preg_match_all('/\d.*\d/U', $str, $mathes);
print_r($mathes);