<?php


class SpecialisedSoldier extends Private_ {
    protected $corps;

    public function __construct($id, $firstName, $lastName, $salary, $corps){
        parent::__construct($id, $firstName, $lastName, $salary);
        $this->corps = $corps;
    }
}