<?php
$people = intval(fgets(STDIN));
$package = fgets(STDIN);

$data = calculate($package);
if($people <= 50) {
    $sumPerPerson = (2500 + $data[0]) - ((2500 + $data[0]) * $data[1]) / $people;
    $sumPerPerson = round($sumPerPerson, 2);
    echo nl2br("We can offer you the Small Hall\nThe price per person is $sumPerPerson$");
} elseif ($people > 50 && $people <= 100) {
    $sumPerPerson = (2500 + $data[0]) - ((2500 + $data[0]) * $data[1]) / $people;
    $sumPerPerson = round($sumPerPerson, 2);
    echo nl2br("We can offer you the Terrace\nThe price per person is $sumPerPerson$");
} elseif ($people > 100 && $people <= 120) {
    $sumPerPerson = (2500 + $data[0]) - ((2500 + $data[0]) * $data[1]) / $people;
    $sumPerPerson = round($sumPerPerson, 2);
    echo nl2br("We can offer you the Great Hall\nThe price per person is $sumPerPerson$");
} elseif ($people > 120) {
    echo "We do not have an appropriate hall.";
}

function calculate($package) {
    switch ($package) {
        case "Normal":
            return [500, 0.05];
        case "Gold":
            return [750, 0.1];
            break;
        case "Platinum":
            return [1000, 0.15];
            break;
    }
}