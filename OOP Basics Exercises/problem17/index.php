<?php

include 'Person.php';

$persons = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'END') {
        break;
    }

    $inputArr  = explode(' ', $input);
    $person = new Person($inputArr[0], $inputArr[1], $inputArr[2]);
    $persons[] = $person;
}

usort($persons, function ($a, $b) {
    return strcmp($a->age, $b->age);
});

foreach ($persons as $person) {
    echo $person;
}
