<?php
$elements = fgets(STDIN);
$elements = explode(' ', $elements);

$maxCount = 0;
$maxCountArr = [];
$maxSec = [];
$maxSecArr = [];
$start = false;
for ($i = 1; $i < count($elements); $i++) {
    if (intval($elements[$i]) > intval($elements[$i - 1])) {
        if (!$start) {
            array_push($maxSec, intval($elements[$i - 1]));
            $maxCount++;
            array_push($maxCountArr, $maxCount);
            $start = true;
        }
        array_push($maxSec, intval($elements[$i]));
        $maxCount++;
        array_push($maxCountArr, $maxCount);
    } else {
        array_push($maxSecArr, $maxSec);
        $maxSec = [];
        $maxCount = 0;
        $start = false;
    }
}

$longestSec = max($maxCountArr);
for ($i = 0; $i < count($maxSecArr); $i++) {
    if ($longestSec === count($maxSecArr[$i])) {
        for ($e = 0; $e < count($maxSecArr[$i]); $e++) {
            echo $maxSecArr[$i][$e].' ';
        }
    }
}
