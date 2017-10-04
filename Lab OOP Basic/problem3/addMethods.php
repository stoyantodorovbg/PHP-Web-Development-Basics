<?php
include 'Car.php';

$car = new Car('Subaru', 'Outback');
$otherCar = new Car('Subaru', 'Forester');

$car -> setYear(2018);
$otherCar -> setYear(2014);

echo $car -> getBrand() . " ";
echo $car -> getModel() . " ";
echo $car -> getYear() . " ";

echo $otherCar -> getBrand() . " ";
echo $otherCar -> getModel() . " ";
echo $otherCar -> getYear() . " ";




