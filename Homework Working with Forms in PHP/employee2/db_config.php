<?php

// Methods
$db = new PDO("mysql:dbname=soft_uni;host=localhost", 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);