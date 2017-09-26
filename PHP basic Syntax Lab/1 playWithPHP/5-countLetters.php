<?php
$word = trim(fgets(STDIN));

$countLetters = [];

for ($i = 0; $i < strlen($word); $i++) {
    if (isset($countLetters[$word[$i]])) {
        $countLetters[$word[$i]]++;
    } else {
        $countLetters[$word[$i]] = 1;
    }
}

foreach ($countLetters as $key => $value) {
    echo "$key -> $value\n";
}