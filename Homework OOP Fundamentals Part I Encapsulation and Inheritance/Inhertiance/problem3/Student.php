<?php


class Student extends Human
{
    protected $facultyNumber;

    public function __construct($firstName, $lastName,$facultyNumber) {
        parent::__construct($firstName, $lastName);
        $this->facultyNumber = $this->setFacultyNumber($facultyNumber);
    }

    public function setFacultyNumber($facultyNumber) {
        if (strlen($facultyNumber >= 5 && strlen($facultyNumber) <= 10)) {
            return $this->facultyNumber = $facultyNumber;
        } else {
            throw new Exception('Invalid faculty number!');
        }

    }

    public function __toString() {
        return 'First Name: '.$this->firstName."\n".
               'Last Name: '.$this->lastName."\n".
               'Faculty Number: '.$this->facultyNumber."\n";
    }


}