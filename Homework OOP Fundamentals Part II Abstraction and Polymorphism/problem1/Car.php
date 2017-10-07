<?php


class Car extends Vehicle
{

    /**
     * Car constructor.
     */
    public function __construct($fuelQuantity, $fuelConsumption) {
        parent::__construct($fuelQuantity, $fuelConsumption);
        $this->summerConsumption = 0.9; // per km
        $this->type = 'Car';
    }
}