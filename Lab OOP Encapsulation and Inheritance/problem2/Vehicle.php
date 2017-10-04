<?php


class Vehicle
{
    private $numbersDoors;
    private $color;

    public function __construct($numbersDoors, $color) {
        $this->setNumbersDoors($numbersDoors);
        $this->setColor($color);
    }

    public function setNumbersDoors($numbersDoors) {
        $this -> numbersDoors = $numbersDoors;
    }

    public function setColor($color) {
        $this -> color = $color;
    }

    public function getDoors() {
        return $this -> numbersDoors;
    }

    public function getColor(){
        return $this -> color;
    }

    public function __get($name) {
        if ($this->{$name}) {
            return $this->{$name};
        } else {
            return "property does not exists";
        }
    }
}