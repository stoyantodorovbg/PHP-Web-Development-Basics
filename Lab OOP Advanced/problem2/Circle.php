<?php


class Circle implements iArea, iCircumference {
    private $radius;
    private $circumference;
    private $surface;

    public function __construct($radius) {
        $this->radius = floatval($radius);
    }

    /**
     * @return mixed
     */
    public function getRadius() {
        return $this->radius;
    }

    public function calcSurface() {
        $this->surface = pi() * $this->radius * $this->radius;
    }

    public function calcCircumference() {
        $this->circumference = pi() * $this->radius * 2;
    }

    /**
     * @return mixed
     */
    public function getCircumference() {
        return $this->circumference;
    }

    /**
     * @return mixed
     */
    public function getSurface() {
        return $this->surface;
    }
}