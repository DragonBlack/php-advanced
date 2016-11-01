<?php
class MyArray implements ArrayAccess {
    private $container = [];

    public function __construct() {
        $this->container = [
            "one"   => 1,
            "two"   => 2,
            "three" => 3,
        ];
    }

    public function offsetSet($offset, $value) {
        echo __METHOD__, '<br/>', PHP_EOL;
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        echo __METHOD__, '<br/>', PHP_EOL;
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        echo __METHOD__, '<br/>', PHP_EOL;
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        echo __METHOD__, '<br/>', PHP_EOL;
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$obj = new MyArray();

var_dump(isset($obj["two"]));
var_dump($obj["two"]);
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"] = "A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);

var_dump(count($obj));

foreach($obj as $k=>$v){
    var_dump($k, $v);
    echo '<br/>', PHP_EOL;
}