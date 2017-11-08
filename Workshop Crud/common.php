<?php
session_start();
spl_autoload_register();
$binder = new \Core\DataBinder();
$template = new \Core\Template();
$dbInfo = parse_ini_file('Config/db.ini');
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = new Database\PDODatabase($pdo);
