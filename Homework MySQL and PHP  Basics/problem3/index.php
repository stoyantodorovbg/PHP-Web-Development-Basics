<?php

include '../db_config.php';
include 'MyPDO.php';

$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
$db->setErrorException();

//error execution
try {
    $continents = $db->query("
SELECT * 
FROM `coninents`
");
    foreach ($continents as $i => $continent) {
        print_r($continent);
        echo("\n\r");
    }
    $continents = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

// right execution
try {
    $continents = $db->query("
SELECT * 
FROM `continents`
");
    foreach ($continents as $i => $continent) {
        print_r($continent);
        echo("\n\r");
    }
    $continents = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}
