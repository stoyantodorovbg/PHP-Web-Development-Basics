<?php
include 'Car.php';
include 'Model.php';

$model = new Model('Golf', 'Siemens', '5', '120');
$car = new Car('Vw', $model);
$car -> setYear('2000');

echo 'brand: ' . $car -> getBrand() . '<br>';
echo 'seats: ' . $car -> getModel() -> model . 'model: '. '<br>';
echo 'engine: ' .$car -> getModel() -> engine .  '<br>';
echo 'seats: ' . $car -> getModel() -> seatsNumber . '<br>';
echo 'horsepower: ' . $car -> getModel() -> horsepower . '<br>';
echo 'year: ' . $car -> getYear() . '<br>';

