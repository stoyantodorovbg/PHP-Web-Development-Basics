<?php
require_once 'common.php';

$taskRepository = new \TaskManagement\Repository\TaskRepository($db);
$taskService = new \TaskManagement\Service\TaskService($taskRepository);
$taskHttpHandler = new \TaskManagement\Http\TaskHttpHandler($template, $binder);
$taskHttpHandler->listAll($taskService, $_GET);
