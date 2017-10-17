<?php

include 'config.php';

$line = trim(intval(fgets(STDIN)));
$db_stm = $db->prepare("DELETE FROM users WHERE USER_ID = :id");
$user_id = $line;
$db_stm->bindParam('id', $user_id);
$db_stm->execute();
