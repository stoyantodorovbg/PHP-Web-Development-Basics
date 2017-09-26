<?php
$speed = trim(intval(fgets(STDIN)));
$area = trim(fgets(STDIN));

$rules = [
    'motorway' => 130,
    'interstate' => 90,
    'city' => 50,
    'residential' => 20
];

checkForInfraction($speed, $area, $rules);

function checkForInfraction($speed, $area, $rules) {
    if ($speed - $rules[$area]  > 0 && $speed - $rules[$area] <= 20) {
        echo 'speeding';
    } else if ($speed - $rules[$area] > 20 && $speed - $rules[$area] <= 40) {
        echo 'excessive speeding';
    } else if ($speed - $rules[$area] > 40) {
        echo 'reckless driving.';
    }
}
