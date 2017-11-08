<?php


namespace App\Repository;


use App\Data\ContactDTO;
use App\Data\CountContactsDTO;
use Database\DatabaseInterface;

interface ContactRepositoryInterface
{
    public function read($start, $perPage): \Generator;

    public function insert(ContactDTO $contact):bool;

    public function update(ContactDTO $contact, int $id):bool;

    public function delete(int $id):bool;

    public function findOneById(int $id): ?ContactDTO;

    public function countContacts(): CountContactsDTO;
}