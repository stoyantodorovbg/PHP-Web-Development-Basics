<?php


class Tiger extends Felime
{
    public function eatFood($foodType, $quantity){
        if ($foodType == 'Meat') {
            $this->foodEaten += $quantity;
        } else {
            echo $this->type.' are not eating that type of food!'."\n";
        }
    }
}