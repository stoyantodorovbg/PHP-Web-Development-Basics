<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$circle = new Circle(10);
$circle->calcSurface();
$circle->calcCircumference();

echo 'Circle with radius = '.$circle->getRadius().' mm:'."<br>";
echo 'Area = '.$circle->getSurface().' mm'."<br>";
echo 'Circumference = '.$circle->getCircumference().' mm';