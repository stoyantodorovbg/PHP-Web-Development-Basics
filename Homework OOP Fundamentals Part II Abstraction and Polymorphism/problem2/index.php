<?php

include 'Vehicle.php';
include 'Car.php';
include 'Truck.php';
include 'Bus.php';

$carInfo = trim(fgets(STDIN));
$truckInfo = trim(fgets(STDIN));
$busInfo = trim(fgets(STDIN));

$carInfoArr = explode(' ', $carInfo);
$truckInfoArr = explode(' ', $truckInfo);
$busInfoArr = explode(' ', $busInfo);

$car = new Car($carInfoArr[1], $carInfoArr[2], $carInfoArr[3]);
$truck = new Truck($truckInfoArr[1], $truckInfoArr[2], $truckInfoArr[3]);
$bus = new Bus($busInfoArr[1], $busInfoArr[2], $busInfoArr[3], true);

$commandsCount = trim(intval(fgets(STDIN)));

for ($i = 0; $i < $commandsCount; $i++) {
    $command = trim(fgets(STDIN));
    $commandArr = explode(' ', $command);
    if ($commandArr[0] == 'DriveEmpty') {
        $bus->switchAC(false);
    } else {
        $bus->switchAC(true);
    }
    if ($commandArr[0] == 'Drive' || $commandArr[0] == 'DriveEmpty') {
        if ($commandArr[1] == 'Car') {
            $car->driveDistance($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->driveDistance($commandArr[2]);
        } elseif ($commandArr[1] == 'Bus') {
            $bus->driveDistance($commandArr[2]);
        }
    } elseif ($commandArr[0] == 'Refuel') {
        if ($commandArr[1] == 'Car') {
            $car->refuel($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->refuel($commandArr[2]);
        } elseif ($commandArr[1] == 'Bus') {
            $bus->refuel($commandArr[2]);
        }
    }
}


echo 'Car: '.number_format($car->getFuelQuantity(), 2)."\n";
echo 'Truck: '.number_format($truck->getFuelQuantity(), 2)."\n";
echo 'Bus: '.number_format($bus->getFuelQuantity(), 2);