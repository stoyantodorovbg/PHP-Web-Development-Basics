<?php

include 'Vehicle.php';

$myVehicle = new Vehicle(2, 'Orange');
print_r($myVehicle);
echo "\n";

$myVehicle->setColor('Blue');
print_r($myVehicle);