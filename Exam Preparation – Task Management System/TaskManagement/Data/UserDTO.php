<?php


namespace TaskManagement\Data;


class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $first_name;
    private $last_name;

    public static function create($username, $password, $firstName, $lastName, $id = null)
    {
        $userDTO =  new UserDTO();

        $userDTO->setUsername($username);
        $userDTO->setPassword($password);
        $userDTO->setFirstName($firstName);
        $userDTO->setLastName($lastName);
        $userDTO->setId($id);

        return $userDTO;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }
}