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

while (true) {
    $input = trim(fgets(STDIN));

    $inputArr = explode(' ', $input);

    $car = new Car($inputArr[0], $inputArr[1]);
    $car->setYear($inputArr[2]);
    $cars[] = $car;

    if (count($cars) === 4) {
        break;
    }
}

sort($cars);

$result = [];
foreach($cars as $car) {
    $brand = $car -> getBrand();
    $model = $car -> getModel();
    $year = $car -> getYear();
    $result[] = "$brand,$model,$year";
}

echo implode("\n", $result);
