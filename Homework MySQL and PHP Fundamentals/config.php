<?php
$db_host = 'localhost';
$db_name = 'geography';
$db_user = 'root';
$db_password = '';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);