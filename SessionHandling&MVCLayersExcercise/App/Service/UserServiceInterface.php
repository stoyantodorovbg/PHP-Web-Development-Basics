<?php

namespace App\Service;

use App\Data\CountUserDTO;
use App\Data\UserDTO;

interface UserServiceInterface
{

    public function register(UserDTO $userData, $confirmPassword):bool;

    public function login(string $username, string $password):?UserDTO;

    public function getCurrentUser(): ?UserDTO;

    public function update(UserDTO $userData):bool;

    public function getCountUsers(): ?CountUserDTO;

    public function viewPerPage(int $page): \Generator;
}