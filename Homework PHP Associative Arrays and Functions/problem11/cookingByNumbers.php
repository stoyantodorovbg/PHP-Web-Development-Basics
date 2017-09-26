<?php
$number = trim(intval(fgets(STDIN)));
$operations = trim(fgets(STDIN));
$operationsArr = explode(', ', $operations);

foreach ($operationsArr as $operation) {
    switch ($operation) {
        case 'chop':
            $number /= 2;
            echo $number . "\n";
            break;
        case 'dice':
            $number = sqrt($number);
            echo $number . "\n";
            break;
        case 'spice':
            $number++;
            echo $number . "\n";
            break;
        case 'bake':
            $number *= 3;
            echo $number . "\n";
            break;
        case 'fillet':
            $number -= $number * 0.2;
            echo $number . "\n";
            break;
    }
}