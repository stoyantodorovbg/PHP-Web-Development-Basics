<?php


class Product
{
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $this->setName($name);
        $this->price = $this->setPrice($price);
    }

    public function setName($name) {
        if ($name != '') {
            return $this->name = $name;
        } else {
            throw new Exception('The name cannot be empty.');
        }

    }

    public function setPrice($price) {
        $price = floatval($price);
        if ($price >= 0) {
            return $this->price = $price;
        } else {
            throw new Exception('The price cannot be negative.');
        }

    }
}