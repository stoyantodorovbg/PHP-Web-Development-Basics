<?php

$venera = new stdClass();

$venera -> sunOrbit_days = 224.7;
$venera -> selfOrbit_days = 243;
$venera -> distanceBySun_km = 108000000;
$venera -> diameter_km = 12.092;
$venera -> highestMount_km = 11;
$venera -> axialTilt_degree = 3;
$venera -> satelites_count = 0;
$venera -> atmosphericPresure_atm = 92;
$venera -> surfaceTemperature_celsius = 443;
$venera -> firstSpacecraftMission_year = 1962;

foreach ($venera as $key => $value) {
    echo "$key->$value<br>";
}
