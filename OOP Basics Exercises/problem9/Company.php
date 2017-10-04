<?php


class Company
{
    public $name;
    public $department;
    public $salary;

    public function __construct($name, $department, $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = number_format(floatval($salary));
    }


}