<?php
$people = [
    ['name'=> 'John'  , 'height'=> 1.65],
    ['name'=> 'Peter' , 'height'=> 1.85],
    ['name'=> 'Silvia', 'height'=> 1.69],
    ['name'=> 'Martin', 'height'=> 1.82]
];

$result = array_filter($people, function($el) {return $el['height'] > 1.80;});

print_r($result);