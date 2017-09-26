<?php
$word = fgets(STDIN);

$word = strtolower($word);

$countLetters = [];

for ($i = 0; $i < strlen($word); $i++) {
    if (isset($countLetters[$word[$i]])) {
        $countLetters[$word[$i]]++;
    } else {
        $countLetters[$word[$i]] = 1;
    }
}
$result = '[';
$counter = 0;
foreach ($countLetters as $key => $value) {
    $counter++;
    $result .= '"';
    $result .= $key;
    $result .= '" => "';
    $result .= $value;
    if ($counter === count($countLetters)) {

    } else {
        $result .= '", ';
    }


}
$result .= ']';
echo($result);
