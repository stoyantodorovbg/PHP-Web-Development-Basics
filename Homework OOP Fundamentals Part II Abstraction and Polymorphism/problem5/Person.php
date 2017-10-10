<?php


abstract class Person{
    protected $name;
    protected $ageBirth;
    protected $ageDead;

    abstract public function getTimeLived();
    abstract public function getGenerationNum();

    /**
     * Father constructor.
     * @param $name
     * @param $ageBirth
     * @param $ageDead
     */
    public function __construct(string $name, int $ageBirth, int $ageDead) {
        $this->name = $name;
        $this->ageBirth = $ageBirth;
        $this->ageDead = $ageDead;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAgeBirth(): int {
        return $this->ageBirth;
    }

    /**
     * @return int
     */
    public function getAgeDead(): int {
        return $this->ageDead;
    }
}