<?php


class Worker extends Human
{
    protected $weekSalary;
    protected $hoursPerDay;
    protected $earnPerHour;

    public function __construct($firstName, $lastName, $weekSalary, $hoursPerDay){
        parent::__construct($firstName, $lastName);
        $this->lastName = $this->setLastName($lastName);
        $this->weekSalary = $this->setWeekSalary($weekSalary);
        $this->hoursPerDay = $hoursPerDay;
    }

    public function setWeekSalary($weekSalary) {
        $weekSalary = intval($weekSalary);
        if ($weekSalary > 10) {
            return $this->weekSalary = $weekSalary;
        } else {
            throw new Exception('Expected value mismatch!Argument: '. $weekSalary);
        }

    }

    public function setHoursPerDay($hoursPerDay) {
        $hoursPerDay = intval($hoursPerDay);
        if ($hoursPerDay >= 1 && $hoursPerDay <= 12) {
            return $this->hoursPerDay = $hoursPerDay;
        } else {
            throw new Exception('Expected value mismatch!Argument: '.$hoursPerDay);
        }

    }

    public function setLastName($lastName) {
        if(strlen($lastName) < 3){
            throw new Exception('Expected length at least 3 symbols!Argument: '.$this->lastName);
        } else {
            return $this->lastName = $lastName;
        }
    }

    private function calculateEarnPerHour() {
        $this->earnPerHour = ($this->weekSalary / 7) / $this->hoursPerDay;
    }

    public function getEarnPerHour() {
        $this->calculateEarnPerHour();
        return $this->earnPerHour;
    }

    public function __toString() {
        return 'First Name: '.$this->firstName."\n".
               'Last Name: '.$this->lastName."\n".
               'Week Salary: '.number_format($this->weekSalary, 2)."\n".
               'Hours per day: '.number_format($this->hoursPerDay, 2)."\n".
               'Salary per hour: '.number_format($this->getEarnPerHour(), 2);
    }
}