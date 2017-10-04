<?php
include 'Person.php';

$input = trim(fgets(STDIN));

$person = new Person($input);
$person->sayHello();
