<?php


namespace App\Service;


use App\Data\EmailDTO;

interface EmailServiceInterface
{
    public function addEmail(EmailDTO $email):bool;

    public function viewEmailsPerUser(int $userId): \Generator;

    public function editEmail(EmailDTO $email, $emailId): bool;

    public function getCurrentEmail($emailId): ?EmailDTO;

    public function deleteEmail($emailId): bool;
}