<?php
require_once 'autoload.php';

use dragonblack\phpwebsocket\Server;

$server = '192.168.1.21:8004';
$pidFile = 'websocket_test.pid';

$config = [
    'socket' => $server,
    'pid' => $pidFile,
    'class' => 'Worker',
];

(new Server($config))->start();

