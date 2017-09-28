<?php
$input = [
    'Hello ',
    'there.',
    'This is just another long string',
    'that would pass the check.',
    ' but',
    ' this',
    ' will',
    ' not',
    'pass it.'
];

$minLen = 20;

$repeatString = function (&$repeatString, $input, $counter, $minLen, $out) {
    if($counter < count($input)) {
        if (strlen($input[$counter]) > $minLen) {
            $out .= " $input[$counter]";
        }
            return $repeatString($repeatString, $input, $counter + 1, $minLen, $out);
    } else {
        return $out;
    }
};

echo $repeatString($repeatString, $input, 0, $minLen, '');