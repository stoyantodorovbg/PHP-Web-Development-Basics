<?php
require_once 'common.php';

$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $binder);
$userHttpHandler->index($userService);