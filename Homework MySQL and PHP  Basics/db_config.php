<?php
$db_host = 'localhost';
$db_name = 'geography';
$db_user = 'root';
$db_password = '123';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);