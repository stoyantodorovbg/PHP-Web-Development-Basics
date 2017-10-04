<?php

include 'DecimalNumber.php';

$input = trim(fgets(STDIN));

$number = new DecimalNumber($input);
echo $number->reverse();
