<?php

include 'Car.php';

while (true) {
    $input = trim(fgets(STDIN));

    $inputArr = explode(' ', $input);

    $car = new Car($inputArr[0], $inputArr[1]);
    $car->setYear($inputArr[2]);
    $cars[] = $car;

    if (count($cars) === 4) {
        break;
    }
}

sort($cars);

$result = [];
foreach($cars as $car) {
    $brand = $car -> getBrand();
    $model = $car -> getModel();
    $year = $car -> getYear();
    $result[] = "$brand,$model,$year";
}

echo implode("\n", $result);
