<?php


namespace App\Service;


use App\Data\ContactDTO;
use App\Repository\ContactRepositoryInterface;

interface ContactServiceInterface
{
    public function showAll();

    public function edit(int $id, ContactDTO $contactDTO);
}