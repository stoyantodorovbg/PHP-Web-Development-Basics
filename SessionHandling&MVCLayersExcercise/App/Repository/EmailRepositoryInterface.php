<?php


namespace App\Repository;

use App\Data\EmailDTO;


interface EmailRepositoryInterface
{
    public function insert(EmailDTO $email):bool;

    /**
     * @return \Generator|EmailDTO[]
     */
    public function findEmailsByUserId(string $userId): \Generator;

    public function edit(EmailDTO $email, $emailId):bool;

    public function findOneById(int $id): ?EmailDTO;

    public function delete(int $id): bool;
}