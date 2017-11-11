<?php


namespace TaskManagement\Repository;

use \TaskManagement\Data\CategoryDTO;


interface CategoryRepositoryInterface
{
    public function showAll(): \Generator;

    public function getCount(): \Generator;
}