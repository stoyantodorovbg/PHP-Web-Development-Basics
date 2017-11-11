<?php


namespace TaskManagement\Repository;

use TaskManagement\Data\TaskDTO;
use Database\DatabaseInterface;
use TaskManagement\Data\CountTasksDTO;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function viewAll($start, $perPage): \Generator
    {
        return $this->db->query("
        SELECT
        users.id,
        categories.id,
        tasks.id,
        title,
        users.first_name AS first_name,
        users.last_name AS last_name,
        categories.name AS category_name
        FROM `tasks`, `users`, `categories`
        WHERE users.id = tasks.author_id
        AND categories.id = tasks.category_id
        ORDER BY tasks.due_date, tasks.id
        LIMIT ".$start.",".$perPage."
        
        ")->execute()
            ->fetch(TaskDTO::class);
    }

    public function countTasks(): CountTasksDTO
    {
        return $this->db->query("
        SELECT COUNT(*) AS `count`
        FROM `tasks`
        ")
            ->execute()
            ->fetch(CountTasksDTO::class)
            ->current();
    }

    public function insert(TaskDTO $task):bool
    {
        $this->db->query("
        INSERT INTO
        `tasks`
        (`title`,
        `description`,
        `location`,
        `author_id`,
        `category_id`,
        `started_on`,
        `due_date`)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $task->getTitle(),
            $task->getDescription(),
            $task->getLocation(),
            $task->getAuthorId(),
            $task->getCategoryId(),
            $task->getStartedOn(),
            $task->getDueDate()
        ]);

        return true;
    }

    public function edit(TaskDTO $task, $taskId): bool
    {
        $this->db->query("
        UPDATE `tasks`
        SET 
        `title` = ?,
        `description` = ?,
        `location` = ?,
        `category_id` = ?,
        `started_on` = ?,
        `due_date` = ?
        WHERE `id` = ?
        ")->execute([
            $task->getTitle() ,
            $task->getDescription(),
            $task->getLocation(),
            $task->getCategoryId(),
            $task->getStartedOn(),
            $task->getDueDate(),
            $taskId
        ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query("
        DELETE FROM `tasks`
        WHERE `id` = ?
        ")->execute([
            $id
        ]);

        return true;
    }

    public function findOneById(int $id): ?TaskDTO
    {
        return $this->db->query("
        SELECT
        *
        FROM `tasks`
        WHERE `id` = ?
        ")
            ->execute([$id])->fetch(TaskDTO::class)
            ->current();
    }

}