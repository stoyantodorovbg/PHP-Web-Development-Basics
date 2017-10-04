<?php
include 'Car.php';
include 'Engine.php';

$enginesCount = trim(intval(fgets(STDIN)));
$engines = [];
for ($i = 0; $i < $enginesCount; $i++) {
    $line = trim(fgets(STDIN));
    $arr = explode(' ', $line);
    $engine = '';
    switch (count($arr)) {
        case 2:
            $engine = new Engine($arr[0], $arr[1]);
            break;
        case 3:
            $engine = new Engine($arr[0], $arr[1], $arr[2]);
            break;
        case 4:
            $engine = new Engine($arr[0], $arr[1], $arr[2], $arr[3]);
            break;
    }

    $engines[$arr[0]] = $engine;
}

$carsCount = trim(intval(fgets(STDIN)));
$cars = [];
for ($i = 0; $i < $carsCount; $i++) {
    $line = trim(fgets(STDIN));
    $arr = explode(' ', $line);
    $car = '';
    switch (count($arr)) {
        case 2:
            $car = new Car($arr[0], $engines[$arr[1]]);
            break;
        case 3:
            $car = new Car($arr[0], $engines[$arr[1]], $arr[2]);
            break;
        case 4:
            $car = new Car($arr[0], $engines[$arr[1]], $arr[2], $arr[3]);
            break;
    }

    $cars[] = $car;
}

foreach ($cars as $car) {
    echo $car;
}

