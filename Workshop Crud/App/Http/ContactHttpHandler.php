<?php


namespace App\Http;

use App\Service\ContactServiceInterface;
use App\Data\ContactDTO;
use App\Data\ErrorDTO;

class ContactHttpHandler extends HttpHandlerAbstract
{

    public function listAll(ContactServiceInterface $contactService, $getData)
    {
        $countContactsDTO = $contactService->getCountContacts();
        $count = $countContactsDTO->getCount();

        if (isset($getData['p'])) {
            $contacts = $contactService->showAll($getData['p']);
        } else {
            $contacts = $contactService->showAll(0);
        }
        $this->render('allContacts', $contacts, $count);

    }

    public function createContact(ContactServiceInterface $contactService, $postData, $getData)
    {
        if (isset($postData['createContact'])) {
            $contact = $this->dataBinder->bind($postData, ContactDTO::class);
            if ($contactService->create($contact)) {
                $this->listAll($contactService, $getData);
            } else {
                $this->render("error",
                    new ErrorDTO("Error adding contact. May be phone numbers or name missing."));
            }
        } else {
            $this->render('createContact');
        }
    }

    public function editContact(ContactServiceInterface $contactService, $postData, $getData)
    {
        $contact = $contactService->findOneById($getData['contactId']);
        $updatedContact = $this->dataBinder->bind($postData, ContactDTO::class);

        if (isset($getData['contactId'])) {
            if (isset($postData['editContact'])) {
                $contactService->update($updatedContact, $contact->getId());
                $this->listAll($contactService, $getData);
            } else {
                $this->render('editContact', $contact);
            }
        } else {
            $this->render("error",
                new ErrorDTO("Something went wrong."));
        }
    }

    public function deleteContact(ContactServiceInterface $contactService, $getData)
    {
        if (isset($getData['contactId'])) {
           if ($contactService->delete($getData['contactId'])) {
               $this->listAll($contactService, $getData);
           } else {
               $this->render("error",
                   new ErrorDTO("Something went wrong."));
           }
        }
    }
}