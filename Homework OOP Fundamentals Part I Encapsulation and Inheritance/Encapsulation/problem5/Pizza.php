<?php


class Pizza
{
    private $name;
    private $dough;
    private $toppings = [];
    private $calories;

    public function __construct($name) {
        $this->name = $this->setName($name);
    }


    private function setName($name) {
        if($name != '') {
            return $this->name = $name;
        }
    }

    public function getCalories() {
        return $this->calories;
    }

    public function getName() {
        return $this->name;
    }

    public function getDough() {
        return $this->dough;
    }

    public function getToppings(): array {
        return $this->toppings;
    }

    public function addTopping($topping) {
        $this->toppings[] = $topping;
    }




}