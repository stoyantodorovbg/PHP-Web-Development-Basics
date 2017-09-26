<?php
$input = fgets(STDIN);
$input = trim($input);
$elements = explode(', ', $input);

$countElements = [];

foreach ($elements as $element) {
    if (array_key_exists($element, $countElements)) {
        $countElements[$element]++;
    } else {
        $countElements[$element] = 1;
    }
}
$result = [];
foreach ($countElements as $key => $value) {
    if ($value === 1) {
        array_push($result, $key);
    }
}

$result = implode(', ', $result);
echo $result;