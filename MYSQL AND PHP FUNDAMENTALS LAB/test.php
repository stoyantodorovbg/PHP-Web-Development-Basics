<?php
$db = new PDO('mysql:host=localhost;dbname=cities','root','');
$db_stm = $db->prepare('INSERT INTO big_table (name) VALUE (:value)');

$value = 'name-'.rand(1, 10000);
$db_stm->bindParam('value', $value);

for ($i = 0; $i < 10000; $i++) {
    $value = 'name-'.rand(1, 10000);
    $db_stm->execute();
}