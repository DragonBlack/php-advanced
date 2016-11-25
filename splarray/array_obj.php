<?php

class MyArray {

}

$a = new MyArray();
//$obj = new ArrayObject([], ArrayObject::STD_PROP_LIST);
$obj = new ArrayObject($a, ArrayObject::ARRAY_AS_PROPS);

$obj["two"] = "A value";
$obj->one = 'Append 1';
$obj->three = 'Append 2';
var_dump($obj);

var_dump(count($obj));

var_dump($obj->two);

echo '<br/>========== Foreach ============</br>';

foreach($obj as $k=>$v){
    var_dump($k, $v);
    echo '<br/>';
}
