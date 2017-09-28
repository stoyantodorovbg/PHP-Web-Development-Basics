<?php
$animals = [
    [ 'name' => 'Waffles', 'type' => 'dog', 'age'  => 12],
    [ 'name' => 'Fluffy', 'type' => 'cat', 'age'  => 14],
    [ 'name' => 'Spelunky', 'type' => 'dog', 'age'  => 4],
    [ 'name' => 'Hank', 'type' => 'dog', 'age'  => 11],
];

$age = 9;
$animals = array_filter($animals, function ($animal) use ($age){
    return $animal['type'] === 'dog' && intval($animal['age']) > $age;
});

print_r($animals);