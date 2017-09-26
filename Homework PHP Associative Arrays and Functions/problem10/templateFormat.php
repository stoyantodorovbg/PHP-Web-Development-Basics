<?php
$input = trim(fgets(STDIN));

$inputArr = explode(',', $input);

$result = '<?xml version="1.0" encoding="UTF-8"?>
<quiz>
';

for ($i = 0; $i < count($inputArr); $i++) {
    $inputArr[$i] = trim($inputArr[$i]);
    if ($i % 2 === 0) {
        $result .= "<question>
    $inputArr[$i]
  </question>
  ";
    } else {
        $result .= "<answer>
    $inputArr[$i]
  </answer>
";
    }
}

$result .= '</quiz>';

echo $result;