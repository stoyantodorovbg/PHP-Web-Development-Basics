<?php


// Methods
$db = new PDO("mysql:dbname=cars;host=localhost", 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);