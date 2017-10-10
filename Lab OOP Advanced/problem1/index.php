<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$rect = new Rectangle(3.4, 4.8);
$rect->getSurface();

echo 'Rectangle, width = '.$rect->getWidth().' mm, height = '.$rect->getHeight().' mm, area = '.$rect->getArea().'mm';

