<?php


namespace App\Repository;


use App\Data\ContactDTO;
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

    public function read()
    {
        return $this->db->query("
        SELECT
        `id`,
        `number` AS `phoneNumber`,
        `first_name` AS `firstName`,
        `last_name`AS `lastName`
        FROM `contacts`
        ")->execute()
            ->fetch(ContactDTO::class);
    }

    public function insert(ContactDTO $db, ContactDTO $contact)
    {
        $this->db->query("
        INSERT INTO
        `contacts`
        (`number`,
        `first_name`,
        `last_name`)
        VALUES (?, ?, ?, ?)
        ")->execute([
            $contact->getPhoneNumber(),
            $contact->getFirstName(),
            $contact->getLastName()
        ]);
    }

    public function update(ContactDTO $db, ContactDTO $contact)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }


}