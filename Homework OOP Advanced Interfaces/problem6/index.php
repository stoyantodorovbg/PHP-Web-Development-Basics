<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$persons = [];
$pets = [];

while(true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $inputArr = explode(' ', $input);

    if (count($inputArr) == 5) {
        $person = new Person($inputArr[1], $inputArr[2], $inputArr[3], $inputArr[4]);
        $persons[] = $person;
    } elseif ($inputArr[0] == 'Pet') {
        $pet = new Pet($inputArr[1], $inputArr[2]);
        $pets[] = $pet;
    }
}

$year = trim(fgets(STDIN));
$output = false;
foreach ($persons as $person) {
    if ($person->checkYear($year)[0]) {
        echo $person->checkYear($year)[1]."\n";
        $output = true;
    }

}
foreach ($pets as $pet) {
    if ($pet->checkYear($year)[0]) {
        echo $pet->checkYear($year)[1]."\n";
        $output = true;
    }
}

if ($output == false) {
    echo '<no output>';
}
