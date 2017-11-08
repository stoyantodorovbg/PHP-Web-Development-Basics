<?php


namespace App\Service;


use App\Data\ContactDTO;
use App\Data\CountContactsDTO;
use App\Repository\ContactRepositoryInterface;

interface ContactServiceInterface
{
    public function showAll($page): \Generator;

    public function create(ContactDTO $contactDTO): bool;

    public function update(ContactDTO $contactDTO, int $id): bool;

    public function delete(int $id): bool;

    public function findOneById(int $id): ContactDTO;

    public function getCountContacts(): CountContactsDTO;

}