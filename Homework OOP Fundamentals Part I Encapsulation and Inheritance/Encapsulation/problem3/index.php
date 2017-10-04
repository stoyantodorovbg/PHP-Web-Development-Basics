<?php

include 'Person.php';
include 'Product.php';

$persons = trim(fgets(STDIN));
$products = trim(fgets(STDIN));

$personsArr = explode(';', $persons);
unset($personsArr[count($personsArr) - 1]);

$productsArr = explode(';', $products);
unset($productsArr[count($productsArr) - 1]);


$personsObj = [];
foreach ($personsArr as $line) {
   $line = explode('=', $line);
   $person = new Person($line[0], $line[1]);
   $personsObj[$line[0]] = $person;
}

$productsObj = [];
foreach ($productsArr as $line) {
    $line = explode('=', $line);
    $product = new Product($line[0], $line[1]);
    $productsObj[$line[0]] = $product;
}

$result = [];
while (true) {
    $purchase = trim(fgets(STDIN));
    if ($purchase == 'END') {
        break;
    }

    $purchaseArr = explode(' ', $purchase);

    $result[] = $personsObj[$purchaseArr[0]]->buy($purchaseArr[1], $productsObj[$purchaseArr[1]]->price);
}

foreach ($result as $line) {
    echo $line."\n";
}

foreach ($personsObj as $person) {
    echo $person;
}
