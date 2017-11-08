<?php


namespace App\Service;


use App\Data\EmailDTO;
use App\Repository\EmailRepositoryInterface;

class EmailService implements EmailServiceInterface
{
    /**
     * @var EmailRepositoryInterface
     */
    private $emailRepository;

    /**
     * EmailService constructor.
     * @param EmailRepositoryInterface $emailRepository
     */
    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }


    public function addEmail(EmailDTO $email): bool
    {
        $emailName = $email->getEmailName();
        if (!filter_var($emailName, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return $this->emailRepository->insert($email);
        }
    }

    public function viewEmailsPerUser(int $userId): \Generator
    {
        return $this->emailRepository->findEmailsByUserId($userId);
    }

    public function editEmail(EmailDTO $email, $emailId): bool
    {
        return $this->emailRepository->edit($email, $emailId);
    }

    public function getCurrentEmail($emailId): ?EmailDTO
    {
        return $this->emailRepository->findOneById($emailId);
    }

    public function deleteEmail($emailId): bool
    {
        $email = $this->getCurrentEmail($emailId);
        if ($email->getUserId() == $_SESSION['id']) {
            return $this->emailRepository->delete($emailId);
        } else {
            return false;
        }

    }


}