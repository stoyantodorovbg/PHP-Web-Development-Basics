<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$citizens = [];
$robots = [];

while(true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $inputArr = explode(' ', $input);

    if (count($inputArr) == 3) {
        $citizen = new Citizen($inputArr[0], $inputArr[1], $inputArr[2]);
        $citizens[] = $citizen;
    } elseif (count($inputArr) == 2) {
        $robot = new Robot($inputArr[0], $inputArr[1]);
        $robots[] = $robot;
    }
}

$fakeNumber = trim(fgets(STDIN));

foreach ($citizens as $citizen) {
    $citizen->checkId($fakeNumber);
}
foreach ($robots as $robot) {
    $robot->checkId($fakeNumber);
}