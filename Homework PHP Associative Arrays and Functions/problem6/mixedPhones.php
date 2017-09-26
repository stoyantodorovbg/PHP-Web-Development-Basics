<?php

$result = [];
while(true) {
    $input = trim(fgets(STDIN));

    if ($input === 'Over') {
        break;
    }

    $inputArr = explode(' : ', $input);
    if (!is_numeric($inputArr[0])) {
        $result[$inputArr[0]] = $inputArr[1];
    } else {
        $result[$inputArr[1]] = $inputArr[0];
    }
}

ksort($result);

foreach ($result as $key => $value) {
    echo "$key -> $value\n";
}
