<?php


class Math {
    public $a;
    public $b;
    public $math_sum;
    public $math_div;

    function math_sum($a,$b){
        return $a+$b;
    }

    function math_div($a,$b){
        $this -> math_check_if_zero($a);
        $this -> math_check_if_zero($b);
        return $a / $b;
    }

    function math_check_if_zero($x){
        if($x == 0){
            echo "division by zero is not possible";
            exit;
        }
    }
}