<?php
include 'Vehicle.php';

$myVehicle = new Vehicle(2, 'Orange');
$myVehicle->setNumbersDoors(4);
echo $myVehicle->__get('numbersDoors');
