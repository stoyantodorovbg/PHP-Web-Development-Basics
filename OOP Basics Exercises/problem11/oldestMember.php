<?php

include 'Family.php';
include 'Person.php';

$lines = trim(intval(fgets(STDIN)));

$family = new Family();
for ($i = 0; $i < $lines; $i++) {
    $input = trim(fgets(STDIN));
    $arr = explode(' ', $input);
    $person = new Person($arr[0], $arr[1]);
    $family->addMember($person);
}

echo $family->getOldestMember();