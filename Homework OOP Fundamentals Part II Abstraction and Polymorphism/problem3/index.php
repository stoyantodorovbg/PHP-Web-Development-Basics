<?php

include 'Food.php';
include 'Animal.php';
include 'Mammal.php';
include 'Felime.php';
include 'Vegetable.php';
include 'Meat.php';
include 'Mouse.php';
include 'Zebra.php';
include 'Cat.php';
include 'Tiger.php';

$animal = null;
$food = null;
$counter = 0;
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }
    $arr = explode(' ', $input);

    if ($counter % 2 == 0) {
        switch ($arr[0]) {
            case 'Tiger':
                $animal = new Tiger($arr[0], $arr[1], floatval($arr[2]), $arr[3]);
                break;
            case 'Cat':
                $animal = new Cat($arr[0], $arr[1], floatval($arr[2]), $arr[3], $arr[4]);
                break;
            case 'Mouse':
                $animal = new Mouse($arr[0], $arr[1], floatval($arr[2]), $arr[3]);;
                break;
            case 'Zebra':
                $animal = new Zebra($arr[0], $arr[1], floatval($arr[2]), $arr[3]);
                break;
        }
    } else {
        switch ($arr[0]) {
            case 'Vegetable':
                $food = new Vegetable($arr[0], intval($arr[1]));
                break;
            case 'Meat':
                $food = new Meat($arr[0], intval($arr[1]));
                break;
        }
    }
    $counter++;
}

$animal->makeSound();
$animal->eatFood($food->getType(), $food->getQuantity());
echo $animal;
