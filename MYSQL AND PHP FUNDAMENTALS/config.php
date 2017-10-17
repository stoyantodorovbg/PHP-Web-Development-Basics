<?php

//insert name of db
$db_name = '';

//insert pass for mysql
$mysql_pass = '';

$db = new PDO("mysql:host=localhost;dbname=$db_name",'root', $mysql_pass);
