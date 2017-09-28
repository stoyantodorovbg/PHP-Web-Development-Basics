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

$car = new Car('Subaru', 'Outback');
$otherCar = new Car('Subaru', 'Forester');

$car -> setYear(2018);
$otherCar -> setYear(2014);

echo $car -> getBrand() . " ";
echo $car -> getModel() . " ";
echo $car -> getYear() . " ";

echo $otherCar -> getBrand() . " ";
echo $otherCar -> getModel() . " ";
echo $otherCar -> getYear() . " ";




