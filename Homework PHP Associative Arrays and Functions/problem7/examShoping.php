<?php

$inventory = [];
$stockTime = true;

while(true) {
    $input = trim(fgets(STDIN));

    if ($input === 'exam time') {
        break;
    } else if ($input === 'shopping time') {
        $stockTime = false;
        continue;
    }

    $inputArr = explode(' ', $input);

    if ($stockTime) {
        if (array_key_exists($inputArr[1], $inventory)) {
            $inventory[$inputArr[1]] += intval($inputArr[2]);
        } else {
            $inventory[$inputArr[1]] = intval($inputArr[2]);
        }
    } else {
        if (array_key_exists($inputArr[1], $inventory) &&
        $inventory[$inputArr[1]] > 0) {
            $inventory[$inputArr[1]] -= intval($inputArr[2]);

        } else {
            echo "$inputArr[1] doesn't exist\n";
        }
    }
}

foreach ($inventory as $key => $value) {
    if ($value > 0) {
        echo "$key -> $value\n";
    }
}