<?php
$input = trim(fgets(STDIN));

while(calculateAverage($input) < 5) {
    $input .= 9;
    calculateAverage($input);
}

echo $input;

function calculateAverage($number) {
    $average = 0;
    for ($i = 0; $i < strlen($number); $i++) {
        $average += intval($number[$i]);
    }
    $average /= strlen($number);
    return $average;
}
