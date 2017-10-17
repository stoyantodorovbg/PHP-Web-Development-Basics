<?php

include 'config.php';

$db_stm = $db->prepare('UPDATE users SET FIRST_NAME = :first_name WHERE USER_ID = :id');
$first_name = 'Ivan';
$user_id = 4;
$db_stm->bindParam('first_name', $first_name);
$db_stm->bindParam('id', $user_id);
$db_stm->execute();


$db_stm->execute();

$first_name = 'Ivan';
$user_id = 7;
$db_stm->execute();