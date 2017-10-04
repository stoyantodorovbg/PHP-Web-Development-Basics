<?php


class Car {
    private $brand;
    private $model;
    private $year;

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year){
        if (intval($year > 2017)) {
            return;
        }
        $this->year = $year;
    }

    function __construct ($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }
}