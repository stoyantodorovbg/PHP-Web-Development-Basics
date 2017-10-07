<?php


class Toppings
{
    public $type;
    public $weight;
    public $calories;

    public function __construct($type, $weight) {
        $weight = floatval($weight);
        $this->type = $this->setType($type);
        $this->weight = $this->setWeight($weight);
    }

    private function setType($type) {
        if($type == 'Meat' || $type == 'Vaggies' || $type == 'Cheese' || $type == 'Sauce') {
            return $this->type = $type;
        } else {
            throw new Exception('Cannot place [name of invalid argument] on top of your pizza.');
        }

    }

    private function setWeight($weight) {
        if($weight >= 1 || $weight <= 50) {
            return $this->weight = $weight;
        } else {
            throw new Exception('[Topping type name] weight should be in the range [1..50].');
        }
    }

    public function getCalories() {
        return $this->calories;
    }

    public function calculateCalories() {
        $this->calories *= 2;

        switch ($this->type) {
            case 'Meat':
                $this->calories *= 1.2;
                break;
            case 'Vaggies':
                $this->calories *= 0.8;
                break;
            case 'Cheese':
                $this->calories *= 1.1;
                break;
            case 'Sauce':
                $this->calories *= 0.9;
                break;
        }

    }
}