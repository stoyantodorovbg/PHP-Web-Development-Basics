<?php
$operation = $argv[1];

$firstNum = intval(fgets(STDIN));
$secNum = intval(fgets(STDIN));

if ($operation === "sum") {
    echo " == " . ($firstNum + $secNum);
} else if ($operation === "subtract") {
    echo " == " . ($firstNum - $secNum);
} else {
    echo " == Wrong operation supplied";
}
