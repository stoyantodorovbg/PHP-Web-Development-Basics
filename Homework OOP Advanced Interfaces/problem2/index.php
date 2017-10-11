<?php
spl_autoload_register(function($class_name){
    include($class_name.'.php');
});


$myCitizen = new Citizen("Peter", 25, '7706126789', "12.06.1977");
echo $myCitizen;