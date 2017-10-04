<?php


class Engine
{
    public $model;
    public $power;
    public $displacement = 'n/a';
    public $efficiency= 'n/a';

    function __construct($model, $power, $displacement = 'n/a', $efficiency= 'n/a') {
        $this -> model = $model;
        $this -> power = $power;
        $this -> displacement = $displacement;
        $this -> efficiency = $efficiency;
    }

    function  __toString() {
        return '    Power: ' . $this -> power . "\n" . '    Displacement: ' . $this -> displacement . "\n" . '    Efficiency: ' . $this -> efficiency . "\n";
    }

}