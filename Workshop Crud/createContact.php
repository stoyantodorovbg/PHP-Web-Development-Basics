<?php
require_once 'common.php';

$contactRepository = new \App\Repository\ContactRepository($db);
$contactService = new \App\Service\ContactService($contactRepository);
$contactHttpHandler = new \App\Http\ContactHttpHandler($template, $binder);
$contactHttpHandler->CreateContact($contactService, $_POST, $_GET);