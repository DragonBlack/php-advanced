<?php
$m = new Memcache();
$m->connect('localhost');

if($code = $m->get('bash')){
    echo 'FROM CACHE<br/>';
    echo $code;
    exit;
}

$code = file_get_contents('http://bash.im');
$m->set('bash', $code, MEMCACHE_COMPRESSED, 20);
echo $code;