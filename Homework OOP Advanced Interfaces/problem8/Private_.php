<?php


class Private_ extends Soldier implements iPrivate_ {
    protected $salary;

    /**
     * Private_ constructor.
     * @param $salary
     */
    public function __construct($id, $firstName, $lastName, $salary) {
        parent::__construct($id, $firstName, $lastName);
        $this->salary = floatval($salary);
    }


    public function __toString() {
        return 'Name: '.$this->firstName.' '.$this->lastName.' Id: '.$this->id.' Salary: '.number_format($this->salary, 2)."\n";
    }

}