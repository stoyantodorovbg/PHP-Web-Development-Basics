<?php


class Vehicle
{
    private $numbersDoors;
    private $color;

    public function __construct($numbersDoors, $color) {
        $this -> numbersDoors = $numbersDoors;
        $this -> color = $color;
    }


}