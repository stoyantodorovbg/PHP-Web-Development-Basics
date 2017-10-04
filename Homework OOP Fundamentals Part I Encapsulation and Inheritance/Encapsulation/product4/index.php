<?php

include 'Gandalf.php';

$foods = trim(fgets(STDIN));

$foodsArr = explode(',', $foods);

for ($i = 0; $i < count($foodsArr); $i++) {
    $foodsArr[$i] = strtolower($foodsArr[$i]);
}

$gandalf = new Gandalf();

foreach ($foodsArr as $food) {
    $gandalf->eat($food);
}

echo $gandalf;