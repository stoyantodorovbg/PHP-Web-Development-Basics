<?php

include 'Box.php';

$length = trim(fgets(STDIN));
$width = trim(fgets(STDIN));
$height = trim(fgets(STDIN));

$figure = new Box($length, $width, $height);

echo $figure;
