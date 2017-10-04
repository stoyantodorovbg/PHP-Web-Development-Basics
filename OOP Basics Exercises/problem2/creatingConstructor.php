<?php
include 'Person.php';

$nameInp = trim(fgets(STDIN));
$ageInp = trim(intval(fgets(STDIN)));

$person = new Person($nameInp, $ageInp);
echo $person -> name . ' ' . $person -> age;