<?php
require_once 'common.php';

$emailRepository = new \App\Repository\EmailRepository($db);
$emailService = new \App\Service\EmailService($emailRepository);
$emailHttpHandler = new \App\Http\EmailHttpHandler($template, $binder);
$emailHttpHandler->deleteEmail($emailService, $_POST, $_GET);
