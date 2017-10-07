<?php


class Dough
{
    private $type1;
    private $type2;
    private $weight;
    private $calories;

    public function __construct($type1, $type2, $weight) {
        $weight = floatval($weight);
        $this->type1 = $this->setType1($type1);
        $this->type2 = $this->setType2($type2);
        $this->weight = $this->setWeight($weight);
    }


    private function setType1($type1) {
        if($type1 == 'White' || $type1 == 'Wholegrain') {
            return $this->type1 = $type1;
        } else {
            throw new Exception('Invalid type of dough.');
        }
    }

    private function setType2($type2) {
        if($type2 == 'Crispy' || $type2 == 'Chewy' || $type2 == 'Homemade') {
            return $this->type2 = $type2;
        } else {
            throw new Exception('Invalid type of dough.');
        }

    }

    public function setWeight($weight) {
        if($weight >= 1 || $weight <= 200) {
            return $this->weight = $weight;
        } else {
            throw new Exception('Dough weight should be in the range [1..200].');
        }

    }

    public function getCalories() {
        return $this->calories;
    }

    public function calculateCalories() {
        $this->calories *= 2;
        if ($this->type1 == 'White') {
            $this->calories *= 1.5;
        }

        switch ($this->type2) {
            case 'Crispy':
                $this->calories *= 0.9;
                break;
            case 'Chewy':
                $this->calories *= 1.1;
                break;
        }

    }
}