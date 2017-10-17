<?php
include 'config.php';

$lines = trim(intval(fgets(STDIN)));
for ($i = 0; $i < $lines; $i++) {
    $line = trim(fgets(STDIN));
    $lineArr = explode(' ', $line);

    $db_stm = $db->prepare("UPDATE users SET $lineArr[1] = :first_name WHERE USER_ID = :id");
    $first_name = $lineArr[2];
    $user_id = intval($lineArr[0]);
    $db_stm->bindParam('first_name', $first_name);
    $db_stm->bindParam('id', $user_id);
    $db_stm->execute();
}

