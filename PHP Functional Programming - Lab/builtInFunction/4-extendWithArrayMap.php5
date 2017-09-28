<?php

$people = [
    [ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
    [ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ]
];

$calculate = function ($weight, $height) {
    $weight /= ($height * $height);
    return $weight;
};
$element = [];

$result = array_map(function($item) use($calculate, $element){
    return $item[] = ['name' => $item['name'], 'bmi' => $calculate($item['weight'], $item['height'])];

},
$people
);

print_r($result);
