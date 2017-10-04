<?php
include 'Fibonacci.php';

$num1 = trim(intval(fgets(STDIN)));
$num2 = trim(intval(fgets(STDIN)));

$fibNumbers = new Fibonacci();
$fibNumbers->getFibNums($num1, $num2);
echo $fibNumbers;