<?php

include 'DateModifier.php';

$date1 = trim(fgets(STDIN));
$date2 = trim(fgets(STDIN));

$dateModifier = new DateModifier($date1, $date2);
$dateModifier->getDifference();
echo $dateModifier->difference->days;
