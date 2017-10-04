<?php


class Trainer
{
    public $name;
    public $badges = 0;
    public $pokemons = [];
    public $appears = 0;

    public function __construct($name, $pokemon) {
        $this->name = $name;
        $this->pokemons[] = $pokemon;
    }

    public function cleanPokemons() {
        for ($i = 0; $i < count($this->pokemons); $i++) {
            if ($this->pokemons[$i]->health <= 0) {
                unset($this->pokemons[$i]);
                $i--;
            }
        }
    }

    public function __toString() {
        return $this->name.' '.$this->badges.' '.count($this->pokemons)."\n";
    }

}