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

$findAverage = function (&$findAverage, $array, $counter, $length, $average) {
    if ($counter < $length) {
        return $findAverage($findAverage, $array, $counter + 1, $length, $average + $array[$counter]);
    } else {
        return $average / count($array);
    }
};

$calc = function (&$calc, $people, $calculate, $counter, $length, $out) use ($findAverage){
    if ($counter < $length) {
        $out[] = $calculate($people[$counter]['weight'], $people[$counter]['height']);
        return $calc($calc, $people, $calculate, $counter + 1, $length, $out);
    } else {
        return $findAverage($findAverage, $out, 0, count($out), 0);
    }


};

print_r($calc($calc, $people, $calculate, 0, count($people), []));

