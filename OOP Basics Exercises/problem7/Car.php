<?php


class Car
{
    public $model;
    public $engine;
    public $weight;
    public $color;

    public function __construct($model, $engine, $weight = 'n/a', $color = 'n/a') {
        $this -> model = $model;
        $this -> engine = $engine;
        $this -> weight = $weight;
        $this -> color = $color;
    }

    function __toString() {
        return $this -> model . ':' . "\n" . '  ' . $this -> engine -> model . ':' . "\n" . $this -> engine . '  Weight: ' . $this -> weight . "\n" . '  Color: ' . $this ->color . "\n";
    }

}