<?php


class Bus extends Vehicle
{
    private $people;

    /**
     * Bus constructor.
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity, $people) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->type = 'Bus';
        $this->switchAC($people);
    }

    public function switchAC($people) {
        if ($people) {
            $this->summerConsumption = 1.4; // per km
        } else {
            $this->summerConsumption = 0; // per km
        }
    }
}