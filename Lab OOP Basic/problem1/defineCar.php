<?php

class Car {
    public $brand;
    public $model;
    public $year;
}

$myCar = new Car();
$myCar -> brand = 'Subaru';
$myCar -> model = 'Forester';
$myCar -> year = '2017';

$otherCar = new Car();
$otherCar -> brand = 'VW';
$otherCar -> model = 'Golf';
$otherCar -> year = '1990';

$car = new Car();
$car -> brand = 'Opel';
$car -> model = 'Corsa';
$car -> year = '2000';

print_r($myCar);
print_r($otherCar);
print_r($car);
