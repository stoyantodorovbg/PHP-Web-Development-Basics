<?php


namespace App\Data;


class EmailDTO
{
    private $userId;
    private $emailName;
    private $emailId;

    public function create($userId, $emailName, $emailId)
    {
        $emailDto = new EmailDTO();

        $emailDto->userId = $userId;
        $emailDto->email = $emailName;
        $emailDto->emailId = $emailId;

        return$emailDto;
    }

    /**
     * @return mixed
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * @param mixed $emailId
     */
    public function setEmailId($emailId)
    {
        $this->emailId = $emailId;
    }

    /**
     * @return mixed
     */
    public function getEmailName()
    {
        return $this->emailName;
    }

    /**
     * @param mixed $email
     */
    public function setEmailName($emailName)
    {
        $this->email = $emailName;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


}