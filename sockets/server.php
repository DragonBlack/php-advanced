#!/usr/local/bin/php -q
<?php
error_reporting(E_ALL);

/* Позволяет скрипту ожидать соединения бесконечно. */
set_time_limit(0);

/* Включает скрытое очищение вывода так, что мы получаем данные
 * как только они появляются. */
ob_implicit_flush();

$address = 'localhost';
$port = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "Can't execute socket_create(): Reason: " . socket_strerror(socket_last_error()) . PHP_EOL;
}

if (socket_bind($sock, $address, $port) === false) {
    echo "Can't execute socket_bind(): Reason: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

if (socket_listen($sock, 5) === false) {
    echo "Can't execute socket_listen(): Reason: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "Can't execute socket_accept(): Reason: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
        break;
    }
    /* Отправляем инструкции. */
    $msg = PHP_EOL."Welcome on test server PHP. ". PHP_EOL .
        "For exit enter 'exit'. For shutdown enter 'off'.". PHP_EOL;
    socket_write($msgsock, $msg, strlen($msg));

    $start = 10;
    do {
        $msg = $start.PHP_EOL;
        socket_write($msgsock, $msg, mb_strlen($msg));
        sleep(1);
        $start--;
    } while ($start > 0);
    socket_close($msgsock);
} while (true);

socket_close($sock);