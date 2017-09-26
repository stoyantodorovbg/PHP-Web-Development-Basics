<?php
$input = trim(fgets(STDIN));

$inputArr = explode(', ', $input);

$firstLength = getLength($inputArr[0], $inputArr[1], $inputArr[2], $inputArr[3]);
$secondLength = getLength($inputArr[2], $inputArr[3], $inputArr[4], $inputArr[5]);
$thirdLength = getLength($inputArr[4], $inputArr[5], $inputArr[0], $inputArr[1]);

$paths = [
    '1->2->3' => $firstLength + $secondLength,
    '2->3->1' => $secondLength + $thirdLength,
    '3->1->2' => $thirdLength + $firstLength,
    '1->3->2' => $thirdLength + $secondLength,
    '2->1->3' => $firstLength + $thirdLength,
    '3->2->1' => $secondLength + $firstLength
];

$shortestPath = min($paths);

$shortestPaths = [];
foreach ($paths as $key => $value) {
    if ($shortestPath === $value) {
        $shortestPaths[$key] = $value;
    }
}

$keys = array_keys($shortestPaths);
$keysStart = array_map(function($el) {return $el = intval($el[0]);}, $keys);
$keyMin = min($keysStart);

foreach ($shortestPaths as $key => $value) {
    if ($shortestPath === $value && $keyMin === intval($key[0])) {
        echo "$key: $value";
    }
}

function getLength($x1, $y1, $x2, $y2) {
    $length = sqrt((abs($x1 - $x2) * (abs($x1 - $x2)) + (abs($y1 - $y2) * (abs($y1 - $y2)))));
    return $length;
}