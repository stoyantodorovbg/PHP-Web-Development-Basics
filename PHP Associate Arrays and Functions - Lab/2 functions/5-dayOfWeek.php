<?php
$input = trim(fgets(STDIN));

getDayOfWeekAsNumber($input);

function getDayOfWeekAsNumber($day) {
    $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];
    for ($i = 0; $i < count($days); $i++) {
        if ($day === $days[$i]) {
            echo $i + 1;
            break;
        }
    }
}