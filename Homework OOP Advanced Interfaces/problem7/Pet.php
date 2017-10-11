<?php


class Pet implements iBeings {
    private  $name;
    private $birth;

    /**
     * Pet constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $birth) {
        $this->name = $name;
        $this->birth = $birth;
    }


    public function checkYear($year) {
        $birthArr = explode('/', $this->birth);
        if ($birthArr[2] == $year) {
            return [true, $this->birth];
        }
        return [false];
    }
}