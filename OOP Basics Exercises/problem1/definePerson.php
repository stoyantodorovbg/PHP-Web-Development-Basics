<?php

include 'Person.php';

$person = new Person();
echo(count(get_object_vars($person)));
echo '<br>';

$person1 = new Person();
$person1 -> name = 'Pesho';
$person1 -> age = 20;

echo $person1 -> name . ' ' . $person1 -> age . '<br>';

$person2 = new Person();
$person2 -> name = 'Gosho';
$person2 -> age = 30;

echo $person2 -> name . ' ' . $person2 -> age . '<br>';

$person3 = new Person();
$person3 -> name = 'Stamat';
$person3 -> age = 40;

echo $person3 -> name . ' ' . $person3 -> age . '<br>';

