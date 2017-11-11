<?php
require_once 'common.php';

$categoryRepository = new \TaskManagement\Repository\CategoryRepository($db);
$categoryService = new \TaskManagement\Service\CategoryService($categoryRepository);

$taskRepository = new \TaskManagement\Repository\TaskRepository($db);
$taskService = new \TaskManagement\Service\TaskService($taskRepository);
$taskHttpHandler = new \TaskManagement\Http\TaskHttpHandler($template, $binder);
$taskHttpHandler->createTask($taskService, $categoryService, $_POST, $_GET);
