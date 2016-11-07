<?php
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<movies>
 <movie>
  <title>PHP: Появление Парсера</title>
  <characters>
   <character>
    <name>Miss Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#xD3;r</actor>
   </character>
  </characters>
  <plot>
   Таким образом, это язык. Это все равно язык программирования. Или
   это скриптовый язык? Все раскрывается в этом документальном фильме,
   похожем на фильм ужасов.
  </plot>
  <great-lines>
   <line>PHP решает все мои задачи в web</line>
  </great-lines>
  <rating type="100500">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;


$xml = new SimpleXMLElement($xmlstr);

$xml->movie->{great-lines}->rating;

var_dump((float)$xml->movie->{great-lines}->rating[0]['type']);