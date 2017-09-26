<?php
$firstNum = intval(fgets(STDIN));
$secNum = intval(fgets(STDIN));
$minNum = min($firstNum, $secNum);
$maxNum = max($firstNum, $secNum);

for ($i = $minNum; $i <= $maxNum; $i++) {
    echo $i . "\n";
}

