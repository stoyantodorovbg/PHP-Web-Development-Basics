<?php


namespace TaskManagement\Repository;

use TaskManagement\Data\CountTasksDTO;
use TaskManagement\Data\TaskDTO;


interface TaskRepositoryInterface
{
    public function viewAll($start, $perPage): \Generator;

    public function countTasks(): CountTasksDTO;

    public function insert(TaskDTO $contact):bool;

    public function edit(TaskDTO $task, $taskId):bool;

    public function findOneById(int $id): ?TaskDTO;

    public function delete(int $id): bool;
}