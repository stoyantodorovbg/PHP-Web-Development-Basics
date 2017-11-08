<?php


namespace App\Repository;

use App\Data\ContactDTO;
use App\Data\CountContactsDTO;
use Database\DatabaseInterface;

class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;
    public  function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function read($start, $perPage): \Generator
    {
        return $this->db->query("
        SELECT
        `id`,
        `number` AS `phoneNumber`,
        `first_name` AS `firstName`,
        `last_name`AS `lastName`
        FROM `contacts`
        LIMIT ".$start.",".$perPage."
        ")->execute()
            ->fetch(ContactDTO::class);
    }

    public function insert(ContactDTO $contact):bool
    {
        $this->db->query("
        INSERT INTO
        `contacts`
        (`number`,
        `first_name`,
        `last_name`)
        VALUES (?, ?, ?)
        ")->execute([
            $contact->getPhoneNumber(),
            $contact->getFirstName(),
            $contact->getLastName()
        ]);

        return true;
    }

    public function update(ContactDTO $contact, int $id):bool
    {
        $this->db->query("
        UPDATE `contacts`
        SET 
        `number` = ?,
        `first_name` = ?,
        `last_name` = ?
        WHERE `id` = ?
        ")->execute([
            $contact->getPhoneNumber(),
            $contact->getFirstName(),
            $contact->getLastName(),
            $id
        ]);

        return true;
    }

    public function delete(int $id):bool
    {
        $this->db->query("
        DELETE
        FROM `contacts`
        WHERE `id` = ?
        ")->execute([$id]);

        return true;
    }

    public function findOneById(int $id): ?ContactDTO
    {
        return $this->db->query("
        SELECT
        `id`,
        `number` AS `phoneNumber`,
        `first_name` AS `firstName`,
        `last_name`AS `lastName`
        FROM `contacts`
        WHERE `id` = ?
        ")->execute([$id])
            ->fetch(ContactDTO::class)
                ->current();
    }

    public function countContacts(): CountContactsDTO
    {
        return $this->db->query("
        SELECT COUNT(*) AS `count`
        FROM `contacts`
        ")
            ->execute()
            ->fetch(CountContactsDTO::class)
            ->current();
    }


}