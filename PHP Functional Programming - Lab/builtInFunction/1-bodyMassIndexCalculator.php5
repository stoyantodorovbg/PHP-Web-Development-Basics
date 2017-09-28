<?php
$people = [
    [ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
    [ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ],
    [ 'name' => 'Ivan'  , 'weight' => 75, 'height'  => 1.72 ],
    [ 'name' => 'Mitko', 'weight' => 95, 'height'  => 1.70 ]
];

$calculate = function ($weight, $height) {
    $weight /= ($height * $height);
    return $weight;
};

$calc = function (&$calc, $people, $calculate, $counter, $length, $out) {
    if ($counter < $length) {
        $out[] = $calculate($people[$counter]['weight'], $people[$counter]['height']);
        return $calc($calc, $people, $calculate, $counter + 1, $length, $out);
    } else {
        return $out;
    }
};

print_r($calc($calc, $people, $calculate, 0, count($people), []));

