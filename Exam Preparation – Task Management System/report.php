<?php
require_once 'common.php';

$categoryRepository = new \TaskManagement\Repository\CategoryRepository($db);
$categoryService = new \TaskManagement\Service\CategoryService($categoryRepository);
$categoryHttpHandler = new \TaskManagement\Http\CategoryHttpHandler($template, $binder);
$categoryHttpHandler->getCount($categoryService);

