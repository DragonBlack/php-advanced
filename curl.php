<?php
$ch = curl_init('http://pikabu.ru');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$res = curl_exec($ch);

preg_match('/<a\s.*(href)\s*=\s*"(.+?)"/', $res, $match);

$info = curl_getinfo($ch);
curl_close($ch);

var_dump($res, $info, $match);