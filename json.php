<?php
$a = [
    1, 2, 3, 4, 4, 6,
];
//$json = json_encode($a);

$str = '{"0":1,"1":2,"2":3,"3":4,"4":4,"5":6,"f1":["a","g"]}';
$obj = json_decode($str, true);

var_dump(json_encode($GLOBALS, JSON_FORCE_OBJECT));
var_dump(PHP_INT_MAX);
//while(list($key, $val)=each($obj)){
//    echo $key,' => ', $val, '<br/>';
//}
?>

<html>
<head>

</head>
<script type="text/javascript">
    var tmp = <?echo $json;?>;
    console.log(tmp);
</script>
<body>

</body>
</html>
