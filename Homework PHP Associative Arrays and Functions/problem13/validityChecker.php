<?php
$input = trim(fgets(STDIN));

$inputArr = explode(', ', $input);

for ($i = 0; $i < count($inputArr); $i++) {
    $inputArr[$i] = intval($inputArr[$i]);
}

checkValidity($inputArr[0], $inputArr[1], 0, 0);

checkValidity($inputArr[2], $inputArr[3], 0, 0);

checkValidity($inputArr[0], $inputArr[1], $inputArr[2], $inputArr[3]);

function checkValidity($x1, $y1, $x2, $y2) {

    $distance = findDistance($x1, $y1, $x2, $y2);

    if (isFloat($distance)) {
        echo '{' . "$x1, $y1" . '}' .' to '. '{' . "$x2, $y2" . '}' . "is invalid\n";
    } else {
        echo '{' . "$x1, $y1" . '}' .' to '. '{' . "$x2, $y2" . '}' . "is valid\n";
    }
}
function findDistance($x1, $y1, $x2, $y2) {
    $distance = sqrt(pow(abs($x1 - $x2), 2) + pow(abs($y1 - $y2), 2));
    return $distance;
};

function isFloat ($var) {
    $remainder = $var - round($var);
    if (!is_numeric($var)) {
        return false;
    } elseif ($remainder == 0) {
        return false;
    } else {
        return true;
    }
}




