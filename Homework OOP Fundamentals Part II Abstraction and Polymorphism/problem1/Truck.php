<?php


class Truck extends Vehicle
{
    /**
     * Truck constructor.
     */
    public function __construct($fuelQuantity, $fuelConsumption) {
        parent::__construct($fuelQuantity, $fuelConsumption);
        $this->fuelWastage = 0.05;
        $this->summerConsumption = 1.6; // per km
        $this->type = 'Truck';
    }
}