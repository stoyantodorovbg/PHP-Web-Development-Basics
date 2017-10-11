<?php


class Person implements iBeings {
    private $name;
    private $age;
    private $id;
    private $birth;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $id
     * @param $birth
     */
    public function __construct($name, $age, $id, $birth) {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
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