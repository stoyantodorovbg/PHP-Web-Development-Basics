<?php
$num1 = intval(fgets(STDIN));
$num2 = intval(fgets(STDIN));
$num3 = intval(fgets(STDIN));

$maxNum = $num1;

if($num2 > $maxNum) {
    $maxNum = $num2;
}

if($num3 > $maxNum) {
    $maxNum = $num3;
}

echo "Max: " . $maxNum;
