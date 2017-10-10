<?php


class Circle implements iArea{
    private $radius;
    private $area;

    public function __construct($radius) {
        $this->radius = floatval($radius);
    }

    public function calcSurface() {
        $this->area = pi() * $this->radius * $this->radius;
    }

    public function __toString() {
        $this->calcSurface();
        return 'Circle, radius = '. $this->radius. ' mm, area = '. $this->area.' mm';
    }
}
