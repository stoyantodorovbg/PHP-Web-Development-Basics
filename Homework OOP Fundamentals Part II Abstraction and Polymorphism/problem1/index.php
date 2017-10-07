<?php
include 'Vehicle.php';
include 'Car.php';
include 'Truck.php';


$carInfo = trim(fgets(STDIN));
$truckInfo = trim(fgets(STDIN));

$carInfoArr = explode(' ', $carInfo);
$truckInfoArr = explode(' ', $truckInfo);

$car = new Car($carInfoArr[1], $carInfoArr[2]);
$truck = new Truck($truckInfoArr[1], $truckInfoArr[2]);

$commandsCount = trim(intval(fgets(STDIN)));

for ($i = 0; $i < $commandsCount; $i++) {
    $command = trim(fgets(STDIN));
    $commandArr = explode(' ', $command);
    if ($commandArr[0] == 'Drive') {
        if ($commandArr[1] == 'Car') {
            $car->driveDistance($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->driveDistance($commandArr[2]);
        }
    } elseif ($commandArr[0] == 'Refuel') {
        if ($commandArr[1] == 'Car') {
            $car->refuel($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->refuel($commandArr[2]);
        }
    }
}


echo 'Car: '.number_format($car->getFuelQuantity(), 2)."\n";
echo 'Truck: '.number_format($truck->getFuelQuantity(), 2);