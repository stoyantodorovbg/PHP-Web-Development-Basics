<?php


namespace TaskManagement\Repository;

use TaskManagement\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user):bool;

    public function findOneByUsername(string $username): ?UserDTO;

    public function findOneById(int $id): ?UserDTO;
}