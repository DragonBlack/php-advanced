<?php

abstract class Animal {
    // фабричный метод который на основе типа возвращает объект
    public static function initial($animal) {
        return new $animal();
    }

    abstract public function voice();
}

class Lion extends Animal {
    public function voice() {
        echo 'Rrrrrrrr i\'m the lion <br />' . PHP_EOL;
    }
}

class Cat extends Animal {
    public function voice() {
        echo 'Meow, meow i\'m the kitty <br />' . PHP_EOL;
    }
}

//function voice(Animal $animal) {
//    $animal->voice();
//}

$animal1 = Animal::initial('Lion');
$animal2 = Animal::initial('Cat');

$animal1->voice();
$animal2->voice();