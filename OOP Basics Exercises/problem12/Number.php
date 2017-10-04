<?php


class Number
{
    public $number;
    private $digitNames = [
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine'
    ];

    public function __construct($number)
    {
        $this->number = intval($number);
    }


    public function getLastDigitName() {
        $strNum = strval($this->number);
        $digit = $strNum[strlen($strNum) - 1];
        return $this->digitNames[$digit];
    }
}