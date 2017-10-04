<?php


class Engine
{
    public $engineSpeed;
    public $enginePower;

    public function  __construct ($engineSpeed, $enginePower) {
        $this -> engineSpeed = intval($engineSpeed);
        $this -> enginePower = intval($enginePower);
    }

}