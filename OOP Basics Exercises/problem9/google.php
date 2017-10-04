<?php

include 'Person.php';
include 'Car.php';
include 'Child.php';
include 'Parents.php';
include 'Pokemon.php';
include 'Company.php';

$persons = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }

    $arr = explode(' ', $input);
    if (!array_key_exists($arr[0], $persons)) {
        $persons[$arr[0]] = new Person($arr[0], new Company('', '', ''), new Car('', ''), new Pokemon('', ''), new Parents('', ''), new Child('', ''));
    }
    $obj = null;

    switch ($arr[1]) {
        case 'company':
            $obj = new Company($arr[2], $arr[3], floatval($arr[4]));
            $persons[$arr[0]]->company = $obj;
            break;
        case 'car':
            $obj = new car($arr[2], $arr[3]);
            $persons[$arr[0]]->car = $obj;
            break;
        case 'pokemon':
            $obj = new Pokemon($arr[2], $arr[3]);
            $persons[$arr[0]]->pokemons[] = $obj;
            break;
        case 'parents':
            $obj = new Parents($arr[2], $arr[3]);
            $persons[$arr[0]]->parents[] = $obj;
            break;
        case 'children':
            $obj = new Child($arr[2], $arr[3]);
            $persons[$arr[0]]->children[] = $obj;
            break;
    }
}

$input = trim(fgets(STDIN));

//print_r($persons);

echo $persons[$input];