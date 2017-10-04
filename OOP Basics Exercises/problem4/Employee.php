<?php


class Employee {
    public $name;
    public $salary;
    public $position;
    public $department;
    public $email;
    public $age;

    public function __construct($name, $salary, $position, $department, $email, $age) {
        $this -> name = $email;
        $this -> salary = $salary;
        $this -> position = $position;
        $this -> department = $department;
        if (!$email) {
            $this -> email  = 'n/a';
        } else {
            $this -> email  = $email;
        }
        if (!$age) {
            $this -> age  = -1;
        } else {
            $this -> age  = $age;
        }
    }
}