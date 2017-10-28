<?php

$db = new PDO("mysql:dbname=php_course;host=localhost", 'root', '123' );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user_name = 'Goshoooo';
//$db_stm = $db->prepare("INSERT INTO users (user_name) VALUE (:user_name)");
//$db_stm->bindParam('user_name', $user_name);
//$db_stm->//execute();
//echo $db->lastInsertId();

$db->beginTransaction();
$db_stm = $db->prepare("INSERT INTO users (user_name) VALUE (:user_name)");
$db_stm->bindParam('user_name', $user_name);
$db_stm->execute();
echo $db->lastInsertId()."\n";
$db->commit();

