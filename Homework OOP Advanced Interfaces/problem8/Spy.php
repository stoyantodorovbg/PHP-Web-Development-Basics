<?php


class Spy extends Soldier {
    private $codeNumber;

    public function __toString() {
        return 'Name: '.$this->firstName.' '.$this->lastName.' Id: '.$this->id."\n".'Code Number: '.$this->codeNumber;
    }
}