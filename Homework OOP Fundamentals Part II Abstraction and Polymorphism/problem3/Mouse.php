<?php


class Mouse extends Mammal
{
    public function eatFood($foodType, $quantity){
        if ($foodType == 'Vegetable') {
            $this->foodEaten += $quantity;
        } else {
            echo $this->type.' are not eating that type of food!'."\n";
        }
    }

}