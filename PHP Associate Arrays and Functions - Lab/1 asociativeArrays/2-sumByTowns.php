<?php
$input = fgets(STDIN);
$array = explode(' ', $input);

$asArray = [];
for ($i = 0, $e = 1; $i < count($array) - 1; $i += 2, $e += 2) {
    if (isset($asArray["$array[$i]"])) {
        $asArray["$array[$i]"] += intval($array[$e]);
    } else {
        $asArray["$array[$i]"] = intval($array[$e]);
    }

}

$result = '[';
$counter = 0;
foreach ($asArray as $key => $value) {
    $counter++;
    $result .= '"';
    $result .= $key;
    $result .= '" => "';
    $result .= $value;
    if ($counter === count($asArray)) {

    } else {
        $result .= '", ';
    }
}
$result .= ']';
echo($result);
