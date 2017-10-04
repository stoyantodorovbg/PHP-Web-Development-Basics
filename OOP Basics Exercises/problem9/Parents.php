<?php


class Parents
{
    public $name;
    public $birthday;

    public function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function __toString() {
        return $this->name.' '.$this->birthday;
    }

}