<?php

$input = trim(fgets(STDIN));

$inputArr = explode(', ', $input);

$islandsData = [
    'Tuvalu' => [1, 3, 1, 3],
    'Tokelau' => [8, 9, 0, 1],
    'Tonga' => [0, 2, 6, 8],
    'Samoa' => [5, 7, 3, 6]
];

for ($i = 1; $i < count($inputArr); $i += 2) {
    findPlace($islandsData, $inputArr[$i - 1], $inputArr[$i]);
}

function findPlace($islandsData, $p1, $p2) {
    $inIsland = false;
    foreach ($islandsData as $key => $value) {
        if (isInTheIsland($value[0], $value[1], $value[2], $value[3], $p1, $p2)) {
            echo $key . "\n";
            $inIsland = true;
        }
    }
    if (!$inIsland) {
        echo 'On the bottom of the ocean'. "\n";
    }
}

function isInTheIsland($x1, $x2, $y1, $y2, $p1, $p2) {
    if ($p1 >= $x1 && $p1 <= $x2 && $p2 >= $y1 && $p2 <= $y2) {
        return true;
    } else {
        return false;
    }
}
