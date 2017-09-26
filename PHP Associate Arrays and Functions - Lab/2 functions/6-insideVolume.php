<?php
$input = trim(fgets(STDIN));

$array = explode(', ', $input);

isInside(separatePoints($array), [10, 50], [20, 80], [15, 50]);

function separatePoints($array) {
    $points = [0 => []];
    $counter = 0;
    for ($i = 1; $i <= count($array); $i++) {
        array_push($points[$counter], $array[$i - 1]);
        if ($i % 3 === 0 && $i < count($array)) {
            $counter++;
            $points[$counter] = [];
        }
    }

    return $points;
}

function isInside ($points, $x, $y, $z) {
    foreach ($points as $point) {
        if ($point[0] >= $x[0] && $point[0] <= $x[1] &&
            $point[1] >= $y[0] && $point[1] <= $y[1] &&
            $point[2] >= $z[0] && $point[2] <= $z[1]) {
            echo "inside\n";
        } else {
            echo "outside\n";
        }
    }
}

//input 13.1, 50, 31.5, 50, 80, 50, -5, 18, 43 inside, inside, outside
