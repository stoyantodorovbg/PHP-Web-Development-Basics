<?php

include  'Car.php';

$inputCar = trim(fgets(STDIN));
$inputCarArr = explode(' ', $inputCar);

$car = new Car($inputCarArr[0], $inputCarArr[1], $inputCarArr[2]);

while(true) {
    $input = trim(fgets(STDIN));
    if ($input ==  'END') {
        break;
    }

    $inputArr = explode(' ', $input);
    if(count($inputArr) == 2) {
        switch ($inputArr[0]) {
            case 'Travel':
                $car->travel($inputArr[1]);
                break;
            case 'Refuel':
                $car->refuel($inputArr[1]);
                break;
        }
    } else {
        switch ($inputArr[0]) {
            case 'Distance':
                echo 'Total Distance: '.$car->getDistance().' kilometers'."\n";
                break;
            case 'Time':
                $time = $car->getTotalTime();
                echo 'Total Time: '.$time[0].' hours and '.$time[1].' minutes'."\n";
                break;
            case 'Fuel':
                echo 'Fuel left: '.$car->getFuel().' liters'."\n";
                break;
        }
    }
}
