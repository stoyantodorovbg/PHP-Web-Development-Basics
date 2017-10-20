<?php
include 'db_config.php';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//get mountain id
$mountain = $db->query("
SELECT `id`
FROM `mountains`
WHERE `mountain_range` = 'Andes'");

$id = null;
foreach ($mountain as $i => $iv) {
    $id = $iv['id'];
}


//get peaks

$peaks = $db->query("
SELECT *
FROM `peaks`
WHERE `mountain_id` = $id
AND `elevation` > 6000
");

foreach ($peaks as $peak => $iv) {
    echo $iv['peak_name'].','.$iv['elevation'].'<br>';
}

