<?php

include 'Car.php';

$carsQuantity = trim(intval(fgets(STDIN)));

$cars = [];
$carsModel = [];
for ($i = 0; $i < $carsQuantity; $i++) {
    $input = trim(fgets(STDIN));
    $inputArr = explode(' ', $input);

    if (!in_array($inputArr[0], $carsModel)) {
        $carsModel[] = $inputArr[0];
        $car = new Car($inputArr[0], doubleval($inputArr[1]), doubleval($inputArr[2]));
        $cars[] = $car;
    }
}

$tripData = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $inputArr = explode(' ', $input);
    $tripData[] = $inputArr;
}

$traveledCars = [];

foreach ($cars as $car) {
    foreach ($tripData as $trip) {
        if ($trip[1] == $car -> model) {
            $car -> travelCar($car -> model, $car -> fuelAmount, $car -> fuelConsumption, doubleval($trip[2]));
        }
    }
}

foreach ($cars as $car) {
    echo $car;
}
