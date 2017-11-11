<?php


namespace TaskManagement\Service;

use TaskManagement\Data\CountTasksDTO;
use TaskManagement\Data\TaskDTO;


interface TaskServiceInterface
{
    public function showAll($page): \Generator;

    public function getCountTasks(): CountTasksDTO;

    public function create(TaskDTO $taskDTO): bool;

    public function editTask(TaskDTO $task, $taskId): bool;

    public function getCurrentTask($taskId): ?TaskDTO;

    public function deleteTask($taskId): bool;
}