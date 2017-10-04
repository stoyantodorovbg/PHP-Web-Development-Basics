<?php
include 'Person.php';

$inputLines = trim(intval(fgets(STDIN)));

$persons = [];
for ($i = 0; $i < $inputLines; $i++) {
    $lineInp = trim(fgets(STDIN));
    $lineArr = explode(' ', $lineInp);
    $person = new Person($lineArr[0], $lineArr[1]);
    $persons[] = $person;
}

$persons = filterByAge($persons);
sort($persons);
printPersons($persons);



function filterByAge($persons) {
    $filtPersons = [];
    foreach($persons as $person) {
        if ($person -> age > 30) {
           $filtPersons[] = $person;
        }
    }
    return $filtPersons;
}

function printPersons($array) {
    foreach($array as $person) {
        echo $person -> name . ' ' . $person -> age . "\n";
    }
}
