<?php


namespace App\Repository;


use App\Data\ContactDTO;
use Database\DatabaseInterface;

interface ContactRepositoryInterface
{
    public function read();

    public function insert(ContactDTO $db, ContactDTO $contact);

    public function update(ContactDTO $db, ContactDTO $contact);

    public function delete(int $id);
}