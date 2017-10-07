<?php


class Person
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $this->setName($name);
        $this->age = $this->setAge($age);
    }


    protected function setName($name) {
        if (strlen($name) >= 3) {
            return $this->name = $name;
        } else {
            throw new Exception('Name’s length should not be less than 3 symbols!');
        }
    }

    protected function setAge($age) {
        $age = intval($age);
        if ($age >= 0) {
            return $this->age = $age;
        } else {
            throw new Exception('Age must be positive!');
        }

    }



}