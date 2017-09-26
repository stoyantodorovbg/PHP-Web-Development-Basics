<?php

$number = intval(fgets(STDIN));
$noSuchNumbers = true;
$result = [];
$max = 987;
if ($number < $max) {
    $max = $number;
}

if ($number > 101) {
    for ($i = 102; $i <= $max; $i++){
        $stringNum = strval($i);
        if ($stringNum[0] !== $stringNum[1] &&
        $stringNum[0] !== $stringNum[2] &&
        $stringNum[1] !== $stringNum[2]) {
           array_push($result, $i);
           $noSuchNumbers = false;
        }
    }
}

if(!$noSuchNumbers) {
    echo implode($result, ', ');
} else {
    echo 'no';
}