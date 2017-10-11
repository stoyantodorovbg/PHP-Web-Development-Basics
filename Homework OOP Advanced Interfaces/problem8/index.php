<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$privates = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $inputArr = explode(' ', $input);


    switch ($inputArr[0]) {
        case 'Private':
            $private = new Private_($inputArr[1],$inputArr[2], $inputArr[3], $inputArr[4]);
            echo $private;
            $privates[] = $private;
            break;
        case 'LeutenantGeneral':
            $privatesThis = [];
            for ($i = 5; $i < count($inputArr); $i++) {
                foreach ($privates as $private) {
                    if ($private->getId() == $inputArr[$i]) {
                        $privatesThis[] = $private;
                    }
                }
            }
            $leutenant = new LeutenantGeneral($inputArr[1],$inputArr[2], $inputArr[3], $inputArr[4], $privatesThis);
            echo $leutenant;
            foreach ($leutenant->getPrivates() as $private) {
                echo $private;
        }
            break;
        case 'Commando':
            $missions = [];
            for ($i = 6; $i < count($inputArr) - 1; $i += 2) {
                $mission = new Mission($inputArr[$i], $inputArr[$i + 1]);
                $missions[] = $mission;
            }
            $commando = new Commando($inputArr[1],$inputArr[2], $inputArr[3], $inputArr[4], $inputArr[5], $missions);
            echo $commando;
            foreach ($missions as $mission) {
                echo $mission;
            }
            break;

        case 'Engineer':
            $repairs = [];
            for ($i = 6; $i < count($inputArr) - 1; $i += 2) {
                $repair = new Repair($inputArr[$i], $inputArr[$i + 1]);
                $repairs[] = $repair;
            }
            $engineer = new Engineer($inputArr[1],$inputArr[2], $inputArr[3], $inputArr[4], $inputArr[5], $repairs);
            echo $engineer;
            foreach ($repairs as $repair) {
                echo $repair;
            }
             break;
        case 'Spy':
            $spy = new Spy($inputArr[0], $inputArr[1], $inputArr[2]);
            break;
    }
}

//print_r($privates);