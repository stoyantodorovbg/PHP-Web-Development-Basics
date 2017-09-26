<?php

$teams = [];
$res = false;
while(true) {
    $input = fgets(STDIN);
    $input = trim($input);
    if ($input == 'Result') {
        $res = true;
        break;
    }

    $inputArr = explode('|', $input);

    $inputArr[0] = str_replace('@', '', $inputArr[0]);
    $inputArr[0] = str_replace('%', '', $inputArr[0]);
    $inputArr[0] = str_replace('$', '', $inputArr[0]);
    $inputArr[0] = str_replace('*', '', $inputArr[0]);
    $inputArr[0] = str_replace('&', '', $inputArr[0]);
    $inputArr[1] = str_replace('&', '', $inputArr[1]);
    $inputArr[1] = str_replace('@', '', $inputArr[1]);
    $inputArr[1] = str_replace('%', '', $inputArr[1]);
    $inputArr[1] = str_replace('$', '', $inputArr[1]);
    $inputArr[1] = str_replace('*', '', $inputArr[1]);

    if (ctype_upper($inputArr[0])) {
        if (!array_key_exists($inputArr[0], $teams)) {
            $teams[$inputArr[0]] = [$inputArr[1] => intval($inputArr[2])];
        } else {
            $teams[$inputArr[0]] += [$inputArr[1] => intval($inputArr[2])];
        }
    } else {
        if (!array_key_exists($inputArr[1], $teams)) {
            $teams[$inputArr[1]] = [$inputArr[0] => intval($inputArr[2])];
        } else {
            $teams[$inputArr[1]] += [$inputArr[0] => intval($inputArr[2])];
        }
    }
}

$teamsScore = [];
foreach ($teams as $key => $value) {
    $score = 0;
    foreach ($value as $players => $playerScore) {
        $score += $playerScore;
    }
    $teamsScore[$key] = $score;
}
arsort($teamsScore);

foreach ($teamsScore as $key => $value) {
    echo "$key => $value\n";

    foreach ($teams as $teamsName => $team) {
        $first = true;
        if ($teamsName === $key) {
            arsort($team);
            foreach ($team as $player => $playerScore) {
                if ($first) {
                    echo "Most points scored by $player\n";
                }
                $first = false;
            }
        }
    }
}

