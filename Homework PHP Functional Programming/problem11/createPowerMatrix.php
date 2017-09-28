<?php

$input = trim(fgets(STDIN));

$inputArr = explode(' ', $input);


$getPowerRow = function (&$getPowerRow, $array, $row, $rowCount, $out) {
    if ($row < $rowCount) {
        $newRow = [];
        for ($i = 0; $i < count($array); $i++) {
            array_push($newRow, getPower($array[$i], $row ));
        }
        array_push($out, $newRow);
        return $getPowerRow($getPowerRow, $array, $row + 1, $rowCount, $out);
    } else {
        for ($i = 0; $i < count($out); $i++) {
            $out[$i] = implode(' ', $out[$i]);
        }
        $result = implode("\n", $out);
        return $result;
    }
};

function getPower ($element, $power) {
    $result = $element;
    for ($i = 0; $i < $power; $i++) {
        $result *= $element;
    }
    return $result;
}

echo $getPowerRow($getPowerRow, $inputArr, 1, count($inputArr), []);
