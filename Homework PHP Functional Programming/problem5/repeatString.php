<?php
$input = 'Hello, there! ';
$count = 5;

$repeatString = function (&$repeatString, $input, $n, $count, $out) {
    if($n < $count) {
        return $repeatString($repeatString, $input, $n + 1, $count, $out . $input);
    } else {
        return $out;
    }
};

echo $repeatString($repeatString, $input, 0, $count, '');
