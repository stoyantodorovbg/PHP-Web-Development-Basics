<?php


class Repair {
    private $partName;
    private $hoursWorked;

    /**
     * Repair constructor.
     * @param $partName
     * @param $hoursWorked
     */
    public function __construct($partName, $hoursWorked) {
        $this->partName = $partName;
        $this->hoursWorked = $hoursWorked;
    }


    public function __toString() {
        return 'Part Name: '.$this->partName.' Hours Worked: '.$this->hoursWorked."\n";
    }
}