<?php


abstract class Animal
{
    protected $name;
    protected $type;
    protected $weight;
    protected $native;
    protected $foodEaten = 0;

    /**
     * Animal constructor.
     * @param $name
     * @param $type
     * @param $weight
     * @param $foodEaten
     */
    public function __construct(string $type, string $name, float $weight, string $native)
    {
        $this->name = $name;
        $this->type = $type;
        $this->weight = $weight;
        $this->native = $native;
    }

    public function makeSound() {
        switch ($this->type) {
            case 'Tiger':
                echo 'ROAAR!!!'."\n";
                break;
            case 'Cat':
                echo 'Meowwww'."\n";
                break;
            case 'Mouse':
                echo 'SQUEEEAAAK!'."\n";
                break;
            case 'Zebra':
                echo 'Zs!!!'."\n";
                break;
        }
    }

    public function __toString() {
        return $this->type.'['.$this->name.', '.$this->weight.', '.$this->native.', '.$this->foodEaten.']'."\n";
    }

}