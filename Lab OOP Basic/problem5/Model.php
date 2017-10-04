<?php
class Model {
    public $model;
    public $engine;
    public $seatsNumber;
    public $horsePower;

    function __construct($model, $engine, $seatNumber, $horsePower) {
        $this -> model = $model;
        $this -> engine = $engine;
        $this -> seatsNumber = $seatNumber;
        $this -> horsepower = $horsePower;
    }


}

