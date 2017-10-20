<?php
include 'db_config.php';

$data_country = $db->query(/** @lang text */
    "
SELECT `country_name` 
FROM 
`countries` AS `a`, 
continents AS `b` 
WHERE `a`.`continent_code` = `b`.`continent_code` 
AND `a`.`population` > 1000000000
");

foreach($data_country as $i => $iv) {
    echo $iv['country_name'].'<br>';
}
