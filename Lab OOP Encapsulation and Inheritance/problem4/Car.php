<?php


class Car extends Vehicle
{
    public $brand;
    public $model;
    public $year;

    public function __construct($numbersDoors, $color, $brand, $model, $year) {
        parent::__construct($numbersDoors, $color);
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;

    }


}