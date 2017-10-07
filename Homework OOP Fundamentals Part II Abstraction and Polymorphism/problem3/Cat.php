<?php


class Cat extends Felime
{
    private $breed;

    /**
     * Cat constructor.
     * @param $breed
     */
    public function __construct(string $type, string $name, float $weight,string $native, string $breed) {
        parent::__construct($type, $name, $weight, $native);
        $this->breed = $breed;
    }

    public function eatFood($foodType, $quantity){
        $this->foodEaten += $quantity;
    }

    public function __toString() {
        return $this->type.'['.$this->name.', '.$this->breed.', '.$this->weight.', '.$this->native.', '.$this->foodEaten.']'."\n";
    }



}