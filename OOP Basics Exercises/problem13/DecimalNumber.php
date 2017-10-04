<?php


class DecimalNumber
{
    public $number;

    public function __construct($number)
    {
        $this->number = doubleval($number);
    }


    public function reverse() {
        $strNum = strval($this->number);
        $reversedNum = '';
        for ($i = strlen($strNum) - 1; $i >= 0; $i--) {
            $reversedNum .= $strNum[$i];
        }

        return $reversedNum;
    }
}