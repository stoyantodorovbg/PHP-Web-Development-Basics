<?php


class Car
{
    public $model;
    public $fuelAmount;
    public $fuelConsumption;
    public $traveledDistance = 0;

    public function __construct($model, $fuelAmount, $fuelConsumption) {
        $this -> model = $model;
        $this -> fuelAmount = $fuelAmount;
        $this -> fuelConsumption = $fuelConsumption;
    }

    public function travelCar($model, $fuelAmount, $fuelConsumption, $trip) {
        $consumedFuel = $fuelConsumption * $trip;
        if ($fuelAmount >= $consumedFuel) {
            $this -> fuelAmount -= $consumedFuel;
            $this -> traveledDistance += $trip;
        } else {
            echo 'Insufficient fuel for the drive' . "\n";
        }
    }

    public function __toString() {
        return $this -> model . ' ' . number_format($this -> fuelAmount, 2) . ' ' . $this -> traveledDistance . "\n";
    }

}