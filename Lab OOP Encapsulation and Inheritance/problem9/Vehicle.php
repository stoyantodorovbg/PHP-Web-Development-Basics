<?php


class Vehicle
{
    protected $numbersDoors = 0;
    protected $color;
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($numbersDoors, $color, $brand, $model, $year) {
        $this->setNumbersDoors($numbersDoors);
        $this->setColor($color);
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    protected function setNumbersDoors($numbersDoors) {
        $this -> numbersDoors = $numbersDoors;
    }

    public function setColor($color) {
        $this -> color = $color;
    }

    public function getDoors() {
        return $this -> numbersDoors;
    }

    public function getColor(){
        return $this -> color;
    }

    public function __get($name) {
        if ($this->{$name}) {
            return $this->{$name};
        } else {
            return "property does not exists";
        }
    }
}