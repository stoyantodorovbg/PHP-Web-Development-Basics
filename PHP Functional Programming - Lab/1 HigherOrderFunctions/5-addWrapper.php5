<?php
$animals = [
    [ 'name' => 'Waffles', 'type' => 'dog', 'age'  => 12],
    [ 'name' => 'Fluffy', 'type' => 'cat', 'age'  => 14],
    [ 'name' => 'Spelunky', 'type' => 'dog', 'age'  => 4],
    [ 'name' => 'Hank', 'type' => 'dog', 'age'  => 11],
];
$age = 9;

function filtersYang ($animal) {
    return $animal['type'] === 'dog' && intval($animal['age']) < 9;
};

function filtersOld ($animal) {
    return $animal['type'] === 'dog' && intval($animal['age']) > 9;
};


$animals = arrayFilter($animals, 'filtersYang');
print_r($animals);
echo "<br>";
$animals = [
    [ 'name' => 'Waffles', 'type' => 'dog', 'age'  => 12],
    [ 'name' => 'Fluffy', 'type' => 'cat', 'age'  => 14],
    [ 'name' => 'Spelunky', 'type' => 'dog', 'age'  => 4],
    [ 'name' => 'Hank', 'type' => 'dog', 'age'  => 11],
];
$animals = arrayFilter($animals, 'filtersOld');
print_r($animals);

function arrayFilter ($array, $filter) {
    $result = [];
    foreach ($array as $item) {
        if ($filter($item) === true) {
            $result[] = $item;
        }
    }
    return $result;
}

