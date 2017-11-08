<?php


namespace App\Http;


use App\Service\EmailServiceInterface;
use App\Data\EmailDTO;
use App\Data\ErrorDTO;

class EmailHttpHandler extends AbstractHttpHandler
{
    public function allEmailPerUser(EmailServiceInterface $emailService, $getData)
    {
        if (isset($getData['userId'])) {
            $emails = $emailService->viewEmailsPerUser($getData['userId']);
            $this->render('email/emailsPerUser', $emails);
        } else {
            $emails = $emailService->viewEmailsPerUser($_SESSION['id']);
            $this->render('email/emailsPerUser', $emails);
        }
    }

    public function addEmail(EmailServiceInterface $emailService, array $postData)
    {
        if (isset($_SESSION['id'])) {
            $this->render('email/addEmail');
            if (isset($postData['addEmail'])) {
                $this->addEmailProcess($emailService, $postData);
            }
        } else {
            $this->redirect('login.php');
        }
    }

    public function editEmail(EmailServiceInterface $emailService, array $postData, array $getData)
    {
        if (isset($getData['emailId'])) {
            $email = $emailService->getCurrentEmail($getData['emailId']);
            $this->render ('email/editEmail', $email);
            if (isset($postData['editEmail'])) {
                $this->editEmailProcess($emailService, $postData, $getData['emailId']);
            }
        } else {
            $this->render("app/error",
                new ErrorDTO("Error edit email."));
        }
    }

    public function deleteEmail(EmailServiceInterface $emailService, array $postData, array $getData)
    {
        if (isset($getData['emailId']) && $emailService->deleteEmail($getData['emailId'])) {
            $this->redirect('emailsPerUser.php');
        } else {
            $this->redirect('login.php');
        }
    }

    private function addEmailProcess(EmailServiceInterface $emailService, $postData)
    {
        $email = $this->dataBinder->bind($postData, EmailDTO::class);
        if ($emailService->addEmail($email)) {
            $this->redirect('emailsPerUser.php');
        } else {
            $this->render("app/error",
                new ErrorDTO("You must type a valid email or log in."));
        }
    }

    private function editEmailProcess(EmailServiceInterface $emailService, array $postData, $emailId)
    {
        $email = $this->dataBinder->bind($postData, EmailDTO::class);
        if ($emailService->editEmail($email, $emailId)) {
            $this->redirect('emailsPerUser.php');
        } else {
            $this->render("app/error",
                new ErrorDTO("You must type a valid email or log in."));
        }
    }
}