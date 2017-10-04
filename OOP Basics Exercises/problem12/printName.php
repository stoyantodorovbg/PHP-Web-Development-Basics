<?php

include 'Number.php';

$input = trim(fgets(STDIN));

$number = new Number($input);
echo $number->getLastDigitName();
