<?php


class Car extends Vehicle
{


    public function __construct($numbersDoors, $color, $brand, $model, $year) {
        parent::__construct($numbersDoors, $color, $brand, $model, $year);

    }

    public function paint($paint_color) {
       $this->color = $paint_color;
    }


}