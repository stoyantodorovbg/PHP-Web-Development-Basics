<?php

include 'config.php';

$lines = trim(intval(fgets(STDIN)));
for ($i = 0; $i < $lines; $i++) {
    $line = trim(fgets(STDIN));
    $lineArr = explode(' ', $line);

    $db_stm = $db->prepare('INSERT INTO users (USER_NAME, FIRST_NAME, LAST_NAME, PHONE) VALUES(:user_name, :first_name, :last_name, :phone)');
    $user_name = $lineArr[0];
    $first_name = $lineArr[1];
    $last_name = $lineArr[2];
    $phone = $lineArr[3];
    $db_stm->bindParam('user_name', $user_name);
    $db_stm->bindParam('first_name', $first_name);
    $db_stm->bindParam('last_name', $last_name);
    $db_stm->bindParam('phone', $phone);
    $db_stm->execute();

}
