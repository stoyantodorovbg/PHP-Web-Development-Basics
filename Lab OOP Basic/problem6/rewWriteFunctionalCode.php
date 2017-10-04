<?php

include 'Math.php';

$result1 = new Math();

echo $result1 -> math_sum(5, 6);
echo '<br>';
echo $result1 -> math_div(5, 2);
echo '<br>';
echo $result1 -> math_div(5, 0);
