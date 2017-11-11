<?php


namespace TaskManagement\Service;

use TaskManagement\Repository\TaskRepositoryInterface;
use TaskManagement\Data\CountTasksDTO;
use TaskManagement\Data\TaskDTO;


class TaskService implements TaskServiceInterface
{

    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * UserService constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function showAll($page): \Generator
    {
        $start = $page * 5;
        return $this->taskRepository->viewAll($start, 5);
    }

    public function getCountTasks(): CountTasksDTO
    {
        return $this->taskRepository->countTasks();
    }

    public function create(TaskDTO $taskDTO): bool
    {
        if (isset($_SESSION['id'])) {
            $taskDTO->setAuthorId($_SESSION['id']);
        }

        if ($taskDTO->getTitle() != ''
            && ($taskDTO->getAuthorId() != ''
                || $taskDTO->getCategoryId() != '')) {
            return $this->taskRepository->insert($taskDTO);
        }
        return false;
    }

    public function editTask(TaskDTO $task, $taskId): bool
    {
        return $this->taskRepository->edit($task, $taskId);
    }

    public function getCurrentTask($taskId): ?TaskDTO
    {
        return $this->taskRepository->findOneById($taskId);
    }

    public function deleteTask($taskId): bool
    {
        $task = $this->getCurrentTask($taskId);
        return $this->taskRepository->delete($taskId);

    }

}