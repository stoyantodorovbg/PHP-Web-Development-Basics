<?php


class Tyre
{
    public $pressure;
    public $age;

    function __construct($pressure, $age) {
        $this -> pressure = doubleval($pressure);
        $this -> age = intval($age);
    }

}