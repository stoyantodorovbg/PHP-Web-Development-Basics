<?php

include 'Vehicle.php';
include 'Bicycle.php';

$bike1 = new Bicycle(0, 'Red', 'RAM', 'HT2', 2016, 'Yes');

$bike2 = new Bicycle(0, 'Blue', 'Peugeot', 'UE-8', 2015, 'No');

$bike1->Ride();

$bike2->Ride();

echo $bike1;
echo $bike2;

$bike2->Stop();
echo $bike2;