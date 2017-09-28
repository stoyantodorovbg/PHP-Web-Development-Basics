<?php

$room = [
    'kithen'      => ['width'=> 3,'length'=>2, 'height' => 2.4],
    'living_room' => ['width'=> 6,'length'=>4, 'height' => 2.4],
    'bedroom'     => ['width'=> 5,'length'=>3, 'height' => 2.2],
];

$resultVolume = array_map(
    function($el) {
        return $el['width'] * $el['length']* $el['height'];
    },
    $room);

$room = array_map(
    function($el) {
       return $el;
    },
    $resultVolume
);

print_r($room);
