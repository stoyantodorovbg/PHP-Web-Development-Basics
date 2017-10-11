<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$input1 = 'Bat Giorgi';

$car1 = new Ferrari('488-Spider', $input1);
echo $car1.'/ inst. '.Ferrari::$objNum."<br>";

$input2 = 'Bai Dinko';

$car2 = new Ferrari('488-Spider', $input2);
echo $car2.'/ inst. '.Ferrari::$objNum;

