<?php


class Child extends Person {

    protected $name;
    protected $age;

    public function __construct($name, $age) {
        parent::__construct($name, $age);
        $this->age = $this->setAge($age);
    }

    public function setAge($age) {
        if ($age <= 16) {
            return $this->age = $age;
        } else {
            throw new Exception('Child’s age must be less than 16!');
        }
    }


}