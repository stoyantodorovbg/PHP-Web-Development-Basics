<?php

include 'db_config.php';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$data_continents = $db->query("
SELECT * 
FROM `continents`");

//print_r($data_continents);

foreach($data_continents as $i => $iv) {
    echo $iv['continent_name'].'<br>';
}

$data_country = $db->query("
SELECT `country_name` 
FROM `countries` 
WHERE `country_name` = 'Bulgaria'
");
foreach($data_country as $i => $iv) {
    echo $iv['country_name'].'<br>';
}