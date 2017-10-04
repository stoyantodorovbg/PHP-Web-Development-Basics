<?php

include 'Vehicle.php';
include 'Car.php';

$car = new Car(4, 'Red', 'Audi', 'A4', 2016);
print_r($car);

echo "<br>";

$car->setColor('Green');
print_r($car);
