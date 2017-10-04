<?php


class Car
{
    private $speed;
    private $fuel;
    private $fuelCost;
    private $totalDistance;
    private $totalTime;

    public function __construct($speed,$fuel, $fuelCost)
    {
        $this->speed = floatval($speed);
        $this->fuel = floatval($fuel);
        $this->fuelCost = floatval($fuelCost);
    }

    public function travel($distance) {
        $distance = floatval($distance);
        if ($this->fuel * $this->fuelCost >= $distance) {
            $this->totalDistance += $distance;
            $this->fuel -= ($distance / 100) * $this->fuelCost;
            $this->totalTime += $distance / $this->speed;
        }
    }

    public function refuel($liters) {
        $liters = floatval($liters);
        $this->fuel += $liters;
    }

    public function getDistance() {
        return number_format($this->totalDistance, 1);
    }

    public function getFuel()
    {
        return number_format($this->fuel);
    }

    public function getTotalTime()
    {
        $hours = round($this->totalTime);
        if ($hours > 0) {
            $minutes = $this->totalTime % $hours;
        } else {
            $minutes = $this->totalTime;
        }
        return [$hours, $minutes];
    }

}