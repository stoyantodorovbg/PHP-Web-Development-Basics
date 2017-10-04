<?php


class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    public function sayHello() {
        $name = $this->name;
        echo "$name says Hello!";
    }
}