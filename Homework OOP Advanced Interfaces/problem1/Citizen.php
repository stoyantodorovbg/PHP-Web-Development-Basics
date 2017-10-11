<?php


class Citizen implements iPerson{
    private $name;
    private $age;

    /**
     * Citizen constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name,  int $age) {
        $this->name = $this->setName($name);
        $this->age = $this->setAge($age);
    }

    public function setName($name) {
        return $this->name = $name;
    }

    public function setAge($age) {
        return $this->age = $age;
    }

    public function __toString() {
        return $this->name.', '.$this->age;
    }
}