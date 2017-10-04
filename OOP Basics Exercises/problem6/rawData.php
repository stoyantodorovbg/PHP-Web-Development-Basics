<?php

include 'Car.php';
include 'Cargo.php';
include 'Engine.php';
include 'Tyre.php';

$carsQuantity = trim(intval(fgets(STDIN)));

$cars = [];
$carsModel = [];
for ($i = 0; $i < $carsQuantity; $i++) {
    $input = trim(fgets(STDIN));
    $arr = explode(' ', $input);

    $engine = new Engine($arr[1], $arr[2]);
    $cargo = new Cargo($arr[3], $arr[4]);
    $tyres[] = new Tyre($arr[5], $arr[6]);
    $tyres[] = new Tyre($arr[7], $arr[8]);
    $tyres[] = new Tyre($arr[9], $arr[10]);
    $tyres[] = new Tyre($arr[11], $arr[12]);

    $car = new Car($arr[0], $engine, $cargo, $tyres);
    $cars[] = $car;
}

$input = trim(fgets(STDIN));

if ($input == 'fragile') {
    foreach ($cars as $car) {
        if ($car -> cargo -> type == 'fragile' &&
            $car -> checkPressure(1)) {
            echo $car;
        }
    }
} elseif ($input == 'flamable') {
    foreach ($cars as $car) {
        if ($car -> cargo -> type == 'flamable' &&
            $car -> checkEnginePower(250)) {
            echo $car;
        }
    }
}
