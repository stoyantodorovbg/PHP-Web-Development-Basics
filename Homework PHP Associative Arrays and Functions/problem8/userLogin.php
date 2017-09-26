<?php

$register = true;
$dataBase = [];
$countUnsuccessfulLogins = 0;

while(true) {
    $input = trim(fgets(STDIN));

    if ($input === 'end') {
        break;
    } else if ($input === 'login') {
        $register = false;
        continue;
    }

    $inputArr = explode(' -> ', $input);

    if ($register) {
        $dataBase[$inputArr[0]] = $inputArr[1];
    } else {
        if (array_key_exists($inputArr[0], $dataBase) &&
        $dataBase[$inputArr[0]] === $inputArr[1]) {
            echo "$inputArr[0]: logged in successfully\n";
        } else {
            $countUnsuccessfulLogins++;
            echo "$inputArr[0]: login failed\n";
        }
    }
}

echo "unsuccessful login attempts: $countUnsuccessfulLogins\n";