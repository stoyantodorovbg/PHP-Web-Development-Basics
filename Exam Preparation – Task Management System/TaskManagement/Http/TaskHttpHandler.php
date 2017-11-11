<?php


namespace TaskManagement\Http;

use TaskManagement\Service\TaskServiceInterface;
use TaskManagement\Service\CategoryServiceInterface;
use TaskManagement\Data\TaskDTO;
use TaskManagement\Data\CategoryDTO;



class TaskHttpHandler extends AbstractHttpHandler
{
    public function listAll(TaskServiceInterface $tasksService, $getData)
    {
        $countContactsDTO = $tasksService->getCountTasks();
        $count = $countContactsDTO->getCount();

        if (isset($getData['p'])) {
            $contacts = $tasksService->showAll($getData['p']);
        } else {
            $contacts = $tasksService->showAll(0);
        }
        $this->render('allTasks', $contacts, $count);

    }

    public function createTask(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, $postData, $getData)
    {
        if (isset($postData['add'])) {
            $task = $this->dataBinder->bind($postData, TaskDTO::class);
            if ($taskService->create($task)) {
                $this->listAll($taskService, $getData);
            } else {
                $categories = $categoryService->showAll();
                $this->render('newTask', $categories);
            }
        } else {
            $categories = $categoryService->showAll();
            $this->render('newTask', $categories);
        }
    }

    public function editTask(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, array $postData, array $getData)
    {
        if (isset($getData['taskId'])) {
            $task = $taskService->getCurrentTask($getData['taskId']);
            $categories = $categoryService->showAll();
            if (isset($postData['edit'])) {
                $this->editTaskProcess($taskService, $categoryService, $postData, $getData, $getData['taskId']);
            } else {
                $this->render ('editTask', $task, $categories);
            }
        } else {
            $this->listAll($taskService, $getData);
        }
    }

    public function deleteTask(TaskServiceInterface $taskService, array $postData, array $getData)
    {
        if (isset($getData['taskId']) && $taskService->deleteTask($getData['taskId'])) {
            $this->listAll($taskService, $getData);
        } else {
            $this->redirect('login.php');
        }
    }

    private function editTaskProcess(TaskServiceInterface $taskService,CategoryServiceInterface $categoryService, array $postData, array $getData, $taskId)
    {
        $task = $this->dataBinder->bind($postData, TaskDTO::class);
        if ($taskService->editTask($task, $taskId)) {
            $this->listAll($taskService, $getData);
        } else {
            $task = $taskService->getCurrentTask($getData['taskId']);
            $categories = $categoryService->showAll();
            $this->render ('editTask', $task, $categories);
        }
    }
}