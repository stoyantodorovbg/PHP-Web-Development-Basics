<?php


class Citizen implements iPerson, iIdentifiable, iBirthable {
    private $name;
    private $age;
    private $id;
    private $birthDate;


    /**
     * Citizen constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name,  int $age, string $id, string $birthDate) {
        $this->name = $this->setName($name);
        $this->age = $this->setAge($age);
        $this->id = $this->setId($id);
        $this->birthDate = $this->setBirthDate($birthDate);
    }

    public function setBirthDate(string $birthDate){
        return $this->birthDate = $birthDate;
    }

    public function setId(string $id) {
        return $this->id = $id;
    }

    public function setName($name) {
        return $this->name = $name;
    }

    public function setAge($age) {
        return $this->age = $age;
    }

    public function __toString() {
        return $this->name.', '.$this->age.', ID = '.$this->id.', '.$this->birthDate;
    }
}