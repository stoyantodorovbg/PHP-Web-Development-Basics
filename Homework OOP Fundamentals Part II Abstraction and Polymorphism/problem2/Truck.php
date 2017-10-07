<?php


class Truck extends Vehicle
{
    /**
     * Car constructor.
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->fuelWastage = 0.05;
        $this->summerConsumption = 1.6; // per km
        $this->type = 'Truck';
    }
}