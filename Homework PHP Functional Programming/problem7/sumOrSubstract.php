<?php

//$input = [
//    0 => ['sum', 12, 13],
//    1 => ['subtract', 3, 3],
//    2 => ['sum', 1, 2]
//];

$input = [
    0 => ['sum', 12, 156],
    1 => ['subtract', 5, 6],
    2 => ['subtract', 1, 2]
];



$simpleCalc = function ($input, $opSum, $opSubtract) {
    $result = [];
    foreach($input as $arr) {
        if ($arr[0] === 'sum') {
            array_push($result, $opSum($arr[1], $arr[2]));
        } else {
            array_push($result, $opSubtract($arr[1], $arr[2]));
        }
    }
    return implode(' ', $result);
};

$opSum = function ($num1, $num2) {
    if (intval($num1) < 0 || intval($num2) > 100) {
        return 'error';
    } else {
        return intval($num1) + intval($num2);
    }

};

$opSubtract = function ($num1, $num2) {
    if (intval($num1) < 0 || intval($num2) > 100) {
        return 'error';
    } else {
        return intval($num1) - intval($num2);
    }
};

echo '[' . $simpleCalc($input, $opSum, $opSubtract) . ']';


