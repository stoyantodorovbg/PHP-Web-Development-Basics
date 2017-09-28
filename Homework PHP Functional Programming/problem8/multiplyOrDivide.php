<?php
$input = [
    0 => ['sum', 12, 133],
    1 => ['subtract', 3, 3],
    2 => ['sum', 1, 2],
    3 => ['divide', 100, 0],
    4 => ['divide', 100, 'PP'],
    5 => ['sum', 'P123', 123]
];

$simpleCalc = function ($input, $opSum, $opSubtract, $opMultiply, $opDivide) {
    $result = [];
    foreach($input as $arr) {
        if ($arr[0] === 'sum') {
            array_push($result, $opSum($arr[1], $arr[2]));
        } elseif($arr[0] === 'subtract') {
            array_push($result, $opSubtract($arr[1], $arr[2]));
        } elseif($arr[0] === 'multiply') {
            array_push($result, $opMultiply($arr[1], $arr[2]));
        } elseif($arr[0] === 'divide') {
            array_push($result, $opDivide($arr[1], $arr[2]));
        }
    }
    return implode(', ', $result);
};

$opSum = function ($num1, $num2) {
    if (!is_numeric($num1)) {
        return 'op1_not_numeric';
    }elseif (!is_numeric($num2)) {
        return 'op2_not_numeric';
    } elseif (intval($num1) < 0 || intval($num2) > 100) {
        return 'out_of_range';
    } else {
        return intval($num1) + intval($num2);
    }

};

$opSubtract = function ($num1, $num2) {
    if (!is_numeric($num1)) {
        return 'op1_not_numeric';
    }elseif (!is_numeric($num2)) {
        return 'op2_not_numeric';
    } elseif (intval($num1) < 0 || intval($num2) > 100) {
        return 'out_of_range';
    } else {
        return intval($num1) - intval($num2);
    }
};

$opMultiply = function ($num1, $num2) {
    if (!is_numeric($num1)) {
        return 'op1_not_numeric';
    }elseif (!is_numeric($num2)) {
        return 'op2_not_numeric';
    } elseif (intval($num1) < 0 || intval($num2) > 100) {
        return 'out_of_range';
    } else {
        return intval($num1) * intval($num2);
    }

};

$opDivide = function ($num1, $num2) {
    if (!is_numeric($num1)) {
        return 'op1_not_numeric';
    }elseif (!is_numeric($num2)) {
        return 'op2_not_numeric';
    } elseif (intval($num1) < 0 || intval($num2) > 100) {
        return 'out_of_range';
    } elseif (intval($num2) === 0){
        return 'division_by_zero';
    } else {
        return intval($num1) / intval($num2);
    }
};

echo '['. $simpleCalc($input, $opSum, $opSubtract, $opMultiply, $opDivide) . ']';