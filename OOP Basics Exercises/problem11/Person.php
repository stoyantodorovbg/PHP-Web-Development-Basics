<?php


class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = intval($age);
    }

    public function __toString() {
        return $this->name.' '.$this->age;
    }


}