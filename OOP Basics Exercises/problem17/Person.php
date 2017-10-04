<?php


class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct($name, $age, $occupation)
    {
        $this->name = $name;
        $this->age = intval($age);
        $this->occupation = $occupation;
    }


    public function __toString() {
        return $this->name.' - age: '.$this->age.', occupation: '.$this->occupation."\n";
    }
}