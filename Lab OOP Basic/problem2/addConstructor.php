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

$car = new Car('Outback', 2010);
$otherCar = new Car('Forester', 2012);

print_r($car);
print_r($otherCar);