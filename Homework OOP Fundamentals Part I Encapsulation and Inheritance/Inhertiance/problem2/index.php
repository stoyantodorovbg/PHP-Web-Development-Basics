<?php

include 'Book.php';
include 'GoldenEditionBook.php';

$name = trim(fgets(STDIN));
$title = trim(fgets(STDIN));
$price = trim(fgets(STDIN));
$type = trim(fgets(STDIN));

$book = null;
if ($type == 'STANDARD'){
    $book = new Book($name, $title, $price, $type);
} elseif ($type == 'GOLD') {
    $book = new GoldenEditionBook($name, $title, $price, $type);
}

if ($book->getMessage() == 'OK') {
    echo $book->getMessage()."\n";
    echo $book->getPrice();
} else {
    echo $book->getMessage();
}

