<?php


class Car {
    public $brand = 'Subaru';
    public $model;
    public $year;

    function __construct ($model, $year) {
        $this->model = $model;
        $this->year = $year;
    }


}