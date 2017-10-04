<?php


class Person
{
    public $name;
    public $company;
    public $car;
    public $pokemons = [];
    public $parents = [];
    public $children = [];

    public function __construct($name, $company, $car, $pokemon, $parent, $child)
    {
        $this->name = $name;
        $this->company = $company;
        $this->car = $car;
        $this->pokemons[] = $pokemon;
        $this->parents[] = $parent;
        $this->children[] = $child;
    }


    public function __toString() {
        $salary = '';
        if ($this->company->salary != 0) {
            $salary = $this->company->salary;
        }
        return $this->name."\n"
            ."Company:\n".
            $this->company->name.' '.$this->company->department.' '.$salary."\n".
            "Car:\n".
            $this->car->model.' '.$this->car->speed."\n".
            "Pokemon:\n".
            implode("\n", $this->pokemons).
            "Parents:\n".
            implode("\n", $this->parents).
            "Children:\n".
            implode("\n", $this->children);

    }




}