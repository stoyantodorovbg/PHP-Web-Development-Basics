<?php


class Car extends Vehicle
{

    /**
     * Car constructor.
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->summerConsumption = 0.9; // per km
        $this->type = 'Car';
    }

    private function checkCapacity() {
        if (($this->type == 'Car' || $this->type == 'Bus') && $this->fuelQuantity > $this->tankCapacity) {
            echo 'Cannot fit fuel in tank';
            return false;
        } else {
            return true;
        }
    }
}