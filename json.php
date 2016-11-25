<?php
$a = [
    1, 2, 3, 4, 4, 6,
];
$json = json_encode($a);

var_dump($json);

$str = '{"0":1,"1":2,"2":3,"3":4,"4":4,"5":6,"f1":["a","g"]}';
$obj = json_decode($str);

var_dump($obj);

//var_dump(json_encode($GLOBALS, JSON_FORCE_OBJECT));
var_dump(PHP_INT_MAX);
while(list($key, $val)=each($obj)){
    echo $key,' => ', $val, '<br/>';
}
?>

<html>
<head>

</head>
<script type="text/javascript">
    var tmp = <?echo $str;?>;
    console.log(tmp);
</script>
<body>

</body>
</html>
