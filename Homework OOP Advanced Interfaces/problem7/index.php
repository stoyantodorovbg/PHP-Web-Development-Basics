<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$lines = trim(fgets(STDIN));

$citizens = [];
$rebels = [];

for ($i = 0; $i < $lines; $i++) {
    $input = trim(fgets(STDIN));
    $inputArr = explode(' ', $input);
    if (count($inputArr) == 4) {
        $citizen = new Citizen($inputArr[0], $inputArr[1], $inputArr[2], $inputArr[3]);
        $citizens[] = $citizen;
    } elseif (count($inputArr) == 3) {
        $rebel = new Rebel($inputArr[0], $inputArr[1], $inputArr[2]);
        $rebels[] = $rebel;
    }
}

$names = [];

while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $names[] = $input;
}
foreach ($names as $name) {
    foreach ($citizens as $citizen) {
        if ($citizen->getName() == $name) {
            $citizen->buyFood();
        }
    }
}

foreach ($names as $name) {
    foreach ($rebels as $rebel) {
        if ($rebel->getName() == $name) {
            $rebel->buyFood();
        }
    }
}

$foodQuantity = 0;

foreach ($citizens as $citizen) {
    $foodQuantity += $citizen->getFood();
}

foreach ($rebels as $rebel) {
    $foodQuantity += $rebel->getFood();
}

echo $foodQuantity.' units food';

