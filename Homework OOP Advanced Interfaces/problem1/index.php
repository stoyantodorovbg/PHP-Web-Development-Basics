<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});


$myCitizen = new Citizen("Peter", 25);
echo $myCitizen;