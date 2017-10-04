<?php


class Bicycle extends Vehicle
{
    public $brand;
    public $model;
    public $year;
    public $forSkirt;
    public $rides = 'Stopped';

    public function __construct($numbersDoors = 0, $color, $brand, $model, $year, $forSkirt) {
        parent::__construct($numbersDoors, $color);
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->forSkirt = $forSkirt;
    }

    public function Ride() {
        $this->rides = 'Rides';
    }

    public function Stop() {
        $this->rides = 'Stopped';
    }

    public function __toString() {
        $brand = $this->brand;
        $model = $this->model;
        $color = $this->getColor();
        $doors = $this->getDoors();
        $year = $this->year;
        $forSkirt = $this->forSkirt;
        $rides = $this->rides;
        $html = "<table><tr><td>Brand: </td><td>$brand</td></tr>";
        $html .= "<tr><td>Model: </td><td>$model</td></tr>";
        $html .= "<tr><td>Color: </td><td>$color</td></tr>";
        $html .= "<tr><td>Doors: </td><td>$doors</td></tr>";
        $html .= "<tr><td>Year: </td><td>$year</td></tr>";
        $html .= "<tr><td>For skirt: </td><td>$forSkirt</td></tr>";
        $html .= "<tr><td>Rides: </td><td>$rides</td></tr>";
        $html .= '</table><br>';
        return $html;
    }

}