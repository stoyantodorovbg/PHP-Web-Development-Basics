<?php


class Pokemon
{
    public $name;
    public  $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function __toString() {
        return $this->name.' '.$this->type;
    }


}