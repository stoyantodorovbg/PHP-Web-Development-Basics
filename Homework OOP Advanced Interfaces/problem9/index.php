<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$input = trim(fgets(STDIN));
$inputArr = explode(' | ', $input);
$being = null;

if ($inputArr[1] == 'Archangel') {
    $being = new Archangel($inputArr[0], $inputArr[2], $inputArr[3]);
} else {
    $being = new Neshto($inputArr[0], $inputArr[2], $inputArr[3]);
}

echo $being;