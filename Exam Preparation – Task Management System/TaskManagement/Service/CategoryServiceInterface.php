<?php


namespace TaskManagement\Service;

use TaskManagement\Data\TaskDTO;

interface CategoryServiceInterface
{
    public function showAll(): \Generator;

    public function getCount(): \Generator;
}



