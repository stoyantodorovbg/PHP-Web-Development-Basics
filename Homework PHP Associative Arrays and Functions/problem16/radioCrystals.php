<?php
$input = trim(fgets(STDIN));
$inputArr = explode(', ', $input);
array_map(function($el) {return $el = intval($el);}, $inputArr);

for ($i = 1; $i < count($inputArr); $i++) {
    echo "Processing chunk $inputArr[$i] microns\n";
    $operations = [];
    $xRay = false;
    while (true) {
        if (($inputArr[$i] / 4) >= $inputArr[0]) {
            $inputArr[$i] /= 4;
            array_push($operations, 'Cut');
        } elseif (($inputArr[$i] - round((0.2 * $inputArr[$i]))) >= $inputArr[0]) {
            $inputArr[$i] -= round((0.2 * $inputArr[$i]));
            array_push($operations, 'Lap');
        } elseif (($inputArr[$i] - 20) >= $inputArr[0]) {
            $inputArr[$i] -= 20;
            array_push($operations, 'Grind');
        } elseif (($inputArr[$i] - 2) >= $inputArr[0] - 1) {
            $inputArr[$i] -= 2;
            array_push($operations, 'Etch');
        } elseif (($inputArr[$i] + 1) == $inputArr[0]) {
            $inputArr[$i]++;
            array_push($operations, 'X-ray');
            $xRay = true;
        }

        if (count($operations) > 1 && $operations[count($operations) - 1] !== $operations[count($operations) - 2] ) {
            $operation = $operations[count($operations) - 2];
            $countOfOperation = count($operations) - 1;
            echo "$operation x$countOfOperation\nTransporting and washing\n";
            $element = $operations[count($operations) - 1];

            $operations = [$element];
        }

        if ($inputArr[0] == $inputArr[$i]) {
            break;
        }
    }

    if (count($operations) === 1 && !$xRay) {
        echo "$operations[0]x1\nTransporting and washing\n";
    } else if ($xRay) {
        echo "X-ray x1\n";
    }
    echo "Finished crystal $inputArr[0] microns\n";
}
