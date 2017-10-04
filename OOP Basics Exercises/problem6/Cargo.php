<?php


class Cargo
{
    public $weight;
    public $type;

    public function __construct($weight, $type) {
        $this -> weight = intval($weight);
        $this -> type = $type;
    }

}