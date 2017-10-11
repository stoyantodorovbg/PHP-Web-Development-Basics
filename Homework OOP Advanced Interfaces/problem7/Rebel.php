<?php


class Rebel implements iBuyer {
    private $name;
    private $age;
    private $group;
    private $food = 0;

    /**
     * Rebel constructor.
     * @param $name
     * @param $age
     * @param $group
     */
    public function __construct($name, $age, $group) {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getFood(): int {
        return $this->food;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }


    public function buyFood() {
        $this->food += 5;
    }
}