<?php


class Pokemon
{
    public $name;
    public $element;
    public $health;

    public function __construct($name, $element, $health) {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

}