<?php


class DateModifier
{
    public $date1;
    public $date2;
    public $difference;

    public function __construct($date1, $date2)
    {
        $this->date1 = date_create_from_format('Y m d', $date1);
        $this->date2 = date_create_from_format('Y m d', $date2);
    }


    public function getDifference() {
        $this->difference = date_diff($this->date1, $this->date2);
    }

}