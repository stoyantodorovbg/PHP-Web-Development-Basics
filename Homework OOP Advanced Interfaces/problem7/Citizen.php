<?php


class Citizen implements iBeings, iBuyer {
    private $name;
    private $age;
    private $id;
    private $birth;
    private $food = 0;

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return int
     */
    public function getFood(): int{
        return $this->food;
    }

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

    public function buyFood() {
        $this->food += 10;
    }
}