<?php
require_once 'common.php';

$contactRepository = new \App\Repository\ContactRepository($db);
$contactService = new \App\Service\ContactService($contactRepository);
$contactHttpHandler = new \App\Http\ContactHttpHandler($template, $binder);
$contactHttpHandler->deleteContact($contactService, $_GET);
