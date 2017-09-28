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

$result1 = new Math();

echo $result1 -> math_sum(5, 6);
echo '<br>';
echo $result1 -> math_div(5, 2);
echo '<br>';
echo $result1 -> math_div(5, 0);
