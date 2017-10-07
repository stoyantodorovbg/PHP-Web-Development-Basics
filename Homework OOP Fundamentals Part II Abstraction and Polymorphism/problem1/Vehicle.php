<?php


class Vehicle
{
    protected $fuelQuantity; //liters
    protected $fuelConsumption; //liters per km
    protected $summerConsumption = 0; // the air condition fuel increases consumption in the summer
    protected $fuelWastage = 0; // of holes in the tank
    protected $type = '';



    /**
     * Vehicle constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     */
    public function __construct($fuelQuantity, $fuelConsumption) {
        $this->fuelQuantity = floatval($fuelQuantity);
        $this->fuelConsumption = floatval($fuelConsumption);
    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float
    {
        return $this->fuelQuantity;
    }

    public function driveDistance($distance) {
        $distance = floatval($distance);
        $consumption = $this->fuelConsumption + $this->summerConsumption;
        if ($this->fuelQuantity >= $distance * $consumption) {
            $this->fuelQuantity -= $distance * $consumption;
            echo $this->type.' travelled '.$distance.' km'."\n";
        } else {
            echo $this->type.' needs refueling'."\n";
        }

    }

    public function refuel($newFuel) {
        $newFuel = floatval($newFuel);
        $this->fuelQuantity += $newFuel - ($this->fuelWastage * $newFuel);
    }

}