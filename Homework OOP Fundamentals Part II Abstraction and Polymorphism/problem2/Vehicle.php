<?php


class Vehicle
{
    protected $fuelQuantity; //liters
    protected $fuelConsumption; //liters per km
    protected $summerConsumption = 0; // the air condition fuel increases consumption in the summer
    protected $fuelWastage = 0; // of holes in the tank
    protected $type = '';
    protected $tankCapacity;



    /**
     * Vehicle constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        $this->fuelQuantity = $this->setFuelQuantity($fuelQuantity);
        $this->fuelConsumption = floatval($fuelConsumption);
        $this->tankCapacity = floatval($tankCapacity);
    }

    /**
     * @param float $fuelQuantity
     */
    public function setFuelQuantity($fuelQuantity) {
        $fuelQuantity = floatval($fuelQuantity);
        if ($fuelQuantity  >= 0 && $this->checkCapacity()) {
            return $this->fuelQuantity = $fuelQuantity;
        } else {
            return $this->fuelQuantity = 0;
        }

    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float {
        return $this->fuelQuantity;
    }

    private function checkFuelQuantity() {
        if ($this->fuelQuantity <= 0) {
            echo 'Fuel must be a positive number'."\n";
        }
    }

    private function checkCapacity($newFuel = 0) {
        if (($this->type == 'Car' || $this->type == 'Bus') && $this->fuelQuantity + $newFuel > $this->tankCapacity) {
            echo 'Cannot fit fuel in tank'."\n";
            return false;
        } else {
            return true;
        }
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
        $this->checkFuelQuantity();

    }

    public function refuel($newFuel) {
        $newFuel = floatval($newFuel);
        if ($this->checkCapacity($newFuel)) {
            $this->fuelQuantity += $newFuel - ($this->fuelWastage * $newFuel);
        }

    }

}