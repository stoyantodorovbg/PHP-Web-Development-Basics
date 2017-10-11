<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$numbers = trim(fgets(STDIN));
$urls = trim(fgets(STDIN));

$numbersArr = explode(' ', $numbers);
$urlsArr = explode(' ', $urls);

$smartPhone = new SmartPhone();

foreach ($numbersArr as $number) {
    echo $smartPhone->call($number);
}
foreach ($urlsArr as $url) {
    echo $smartPhone->browse($url);
}