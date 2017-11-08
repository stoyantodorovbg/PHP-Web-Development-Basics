<?php

namespace App\Repository;

use App\Data\UserDTO;
use App\Data\CountUserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
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


    public function insert(UserDTO $user):bool
    {
        $this->db->query("
        INSERT INTO 
        `users`
        (`username`, 
        `password`, 
        `first_name`,
        `last_name`,
        `born_on`)
        VALUES (?, ?, ?, ?, ?)
        ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBornOn()
        ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
        SELECT
        `user_id` AS `id`,
        `username`, 
        `password`, 
        `first_name` AS `firstName`,
        `last_name` AS `lastName`,
        `born_on` AS `bornOn`
        FROM `users`
        WHERE `username` = ?
        ")
            ->execute([$username])->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query("
        SELECT
        `user_id`,
        `username`, 
        `password`, 
        `first_name` AS `firstName`,
        `last_name` AS `lastName`,
        `born_on` AS `bornOn`
        FROM `users`
        WHERE `user_id` = ?
        ")
            ->execute([$id])->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $user): bool
    {
        $this->db->query("
        UPDATE `users`
        SET 
        `username` = ?,
        `password` = ?,
        `first_name` = ?,
        `last_name` = ?,
        `born_on` = ?
        WHERE `user_id` = ?
        ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBornOn(),
            $id
        ]);

        return true;
    }

    public function findAll(): \Generator
    {
        return $this->db->query("
        SELECT
        `user_id` AS `id`,
        `username`, 
        `password`, 
        `first_name` AS `firstName`,
        `last_name` AS `lastName`,
        `born_on` AS `bornOn`
        FROM `users`
        LIMIT 3
        ")
            ->execute()->fetch(UserDTO::class);
    }

    public function countUsers(): \Generator
    {
        return $this->db->query("
        SELECT COUNT(*) AS `count`
        FROM `users`
        ")
            ->execute()->fetch(CountUserDTO::class);
    }

    public function findByPages(int $start, int $perPage): \Generator
    {
        return $this->db->query("
        SELECT
        `user_id` AS `id`,
        `username`, 
        `password`, 
        `first_name` AS `firstName`,
        `last_name` AS `lastName`,
        `born_on` AS `bornOn`
        FROM `users`
        LIMIT ".$start.",".$perPage."
        ")
            ->execute()->fetch(UserDTO::class);
    }
}