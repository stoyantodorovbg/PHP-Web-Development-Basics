<?php

namespace App\Repository;

use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user):bool;

    public function findOneByUsername(string $username): ?UserDTO;

    public function findOneById(int $id): ?UserDTO;

    public function update(int $id, UserDTO$user):bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator;
}