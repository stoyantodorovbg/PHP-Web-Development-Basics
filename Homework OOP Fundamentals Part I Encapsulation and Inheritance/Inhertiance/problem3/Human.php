<?php


class Human
{
    protected $firstName;
    protected $lastName;

    public function setFirstName($firstName){
        if (!ctype_upper($firstName[0])) {
            throw new Exception('Expected upper case letter!Argument: '.$firstName);
        } elseif (strlen($firstName) < 4) {
            throw new Exception('Expected length at least 4 symbols!Argument: '.$firstName);
        } else {
            return $this->firstName = $firstName;
        }


    }

    public function setLastName($lastName){
        if (!ctype_upper($lastName[0])) {
            throw new Exception('Expected upper case letter!Argument: '.$lastName);
        } elseif(strlen($lastName) < 3){
            throw new Exception('Expected length at least 3 symbols!Argument: '.$lastName);
        } else {
            return $this->lastName = $lastName;
        }
    }



    public function __construct($firstName, $lastName){
        $this->firstName = $this->setFirstName($firstName);
        $this->lastName = $this->setLastName($lastName);
    }


}