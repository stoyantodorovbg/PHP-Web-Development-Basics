<?php

include 'db_config.php';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

