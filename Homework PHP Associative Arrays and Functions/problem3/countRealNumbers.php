<?php
$input = trim(fgets(STDIN));
$inputArr = explode(' ', $input);

$wordsCount = [];
foreach ($inputArr as $key => $value) {
    if (array_key_exists($value, $wordsCount)) {
        $wordsCount[$value]++;
    } else {
        $wordsCount[$value] = 1;
    }
}
ksort($wordsCount);

foreach ($wordsCount as $key => $value) {
    echo "$key -> $value times\n";
}

//8 2.5 2.5 8 2.5