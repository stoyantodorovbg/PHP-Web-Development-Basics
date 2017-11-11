<?php


namespace TaskManagement\Service;

use TaskManagement\Data\UserDTO;


interface UserServiceInterface
{
    public function register(UserDTO $userData, $confirmPassword):bool;

    public function login(string $username, string $password):?UserDTO;

    public function getCurrentUser(): ?UserDTO;
}