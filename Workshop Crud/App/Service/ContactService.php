<?php


namespace App\Service;


use App\Data\ContactDTO;
use App\Data\CountContactsDTO;
use App\Repository\ContactRepositoryInterface;

class ContactService implements ContactServiceInterface
{
    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepository;

    /**
     * ContactService constructor.
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    public function showAll($page): \Generator
    {
        $start = $page * 3;
        return $this->contactRepository->read($start, 3);
    }

    public function create(ContactDTO $contactDTO): bool
    {
        if ($contactDTO->getPhoneNumber() != ''
            && ($contactDTO->getFirstName() != ''
                || $contactDTO->getLastName() != '')) {
            return $this->contactRepository->insert($contactDTO);
        }
        return false;
    }

    public function update(ContactDTO $contactDTO,int $id): bool
    {
        if ($contactDTO->getPhoneNumber() != ''
            && ($contactDTO->getFirstName() != ''
                || $contactDTO->getLastName() != '')) {
            return $this->contactRepository->update($contactDTO, $id);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        return $this->contactRepository->delete($id);
    }

    public function findOneById(int $id): ContactDTO
    {
        return $this->contactRepository->findOneById($id);
    }

    public function getCountContacts(): CountContactsDTO
    {
        return $this->contactRepository->countContacts();
    }


}