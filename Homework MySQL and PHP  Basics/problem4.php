<?php
include 'db_config.php';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$data_continents = $db->query("
SELECT * 
FROM `continents`
");
$resultArr = [];
foreach($data_continents as $i => $iv) {
    $continent = $iv['continent_name'].' ('.$iv['continent_code'].')';
    $resultArr[] = $continent;
}
$result = implode(', ', $resultArr);
echo $result;