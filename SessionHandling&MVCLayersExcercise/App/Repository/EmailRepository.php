<?php


namespace App\Repository;


use App\Data\EmailDTO;
use Database\DatabaseInterface;

class EmailRepository implements EmailRepositoryInterface
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

    public function insert(EmailDTO $email): bool
    {
        $this->db->query("
        INSERT INTO 
        `emails`
        (`user_id`, 
        `email_name`)
        VALUES (?, ?)
        ")->execute([
            $_SESSION['id'],
            $email->getEmailName(),

        ]);

        return true;
    }

    public function findEmailsByUserId(string $userId): \Generator
    {
        return $this->db->query("
        SELECT
        `email_id` AS `emailId`,
        `user_id` AS `userId`,
        `email_name` AS `emailName`
        FROM `emails`
        WHERE `user_id` = ?
        ")
            ->execute([$userId])->fetch(EmailDTO::class);
    }

    public function edit(EmailDTO $email, $emailId): bool
    {
        $this->db->query("
        UPDATE `emails`
        SET 
        `email_name` = ?
        WHERE `email_id` = ?
        ")->execute([
            $email->getEmailName() ,
            $emailId
        ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query("
        DELETE FROM `emails`
        WHERE `email_id` = ?
        ")->execute([
            $id
        ]);

        return true;
    }

    public function findOneById(int $id): ?EmailDTO
    {
        return $this->db->query("
        SELECT
        `email_id` AS `emailId`,
        `user_id` AS `userId`, 
        `email_name` AS `emailName`
        FROM `emails`
        WHERE `email_id` = ?
        ")
            ->execute([$id])->fetch(EmailDTO::class)
            ->current();
    }
}