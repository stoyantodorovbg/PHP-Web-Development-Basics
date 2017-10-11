<?php


class Citizen implements iPersonalData {
    private $name;
    private $age;
    private $id;

    /**
     * Citizen constructor.
     * @param $name
     * @param $age
     * @param $id
     */
    public function __construct($name, $age, $id) {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }


    public function checkId($fakePart) {
        if (strpos($this->id, $fakePart)) {
            echo $this->id."\n";
        }
    }
}