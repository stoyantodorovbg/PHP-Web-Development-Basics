<?php


namespace TaskManagement\Service;

use TaskManagement\Repository\CategoryRepositoryInterface;



class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * UserService constructor.
     * @param CategoryRepositoryInterface $taskRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function showAll(): \Generator
    {
        return $this->categoryRepository->showAll();
    }

    public function getCount(): \Generator
    {
        return $this->categoryRepository->showAll();
    }


}