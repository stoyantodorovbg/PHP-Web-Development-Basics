<?php
$text = fgets(STDIN);
$data = fgets(STDIN);

$dataArr = explode(' ', $data);
$number = intval($dataArr[1]);

$find = false;
$occurrences = 0;
for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] === $dataArr[0]) {
        $occurrences++;
    }
    if ($occurrences === $number) {
        $find = true;
        echo $i;
        break;
    }
}

if(!$find) {
    echo 'Find the letter yourself!';
}