<?php


class Person
{
    public $name;
    public $money;
    public $bag = [];

    public function __construct($name, $money) {
        $this->name = $this->setName($name);
        $this->money = $this->setMoney($money);
    }

    public function setName($name) {
        if ($name != '') {
            return $this->name = $name;
        } else {
            throw new Exception('The name cannot be empty.');
        }

    }

    public function setMoney($money) {
        $money = floatval($money);
        if ($money >= 0) {
            return $this->money = $money;
        } else {
            throw new Exception('The money cannot be negative.');
        }

    }

    public function buy($productName, $productPrice) {
        $productPrice = floatval($productPrice);
        if ($this->money >= $productPrice) {
            $this->money -= $productPrice;
            $this->bag[] = new Product($productName, $productPrice);
            return $this->name.' bought '.$productName;
        } else {
            return $this->name.' can\'t afford '.$productName;
        }
    }

    public function __toString() {
        $products = [];
        if (count($products) > 0) {
            foreach ($this->bag as $product) {
                $products[] = $product->name;
            }
            return $this->name.' - '.implode(', ', $products)."\n";
        } else {
            return $this->name. ' - Nothing bought';
        }

    }
}