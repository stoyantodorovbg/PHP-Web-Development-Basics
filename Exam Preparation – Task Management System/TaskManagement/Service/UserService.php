<?php


namespace TaskManagement\Service;

use TaskManagement\Data\UserDTO;
use TaskManagement\Repository\UserRepositoryInterface;


class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, $confirmPassword):bool
    {
        if ($userDTO->getpassword() != $confirmPassword) {
            return false;
        }

        if (null !== $this->userRepository->findOneByUsername($userDTO->getUsername())) {
            return false;
        }

        $plainPassword = $userDTO->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $userDTO->setPassword($passwordHash);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password):?UserDTO
    {
        $user = $this->userRepository->findOneByUsername($username);
        if ($user === null) {
            return null;
        }
        $passwordHash = $user->getPassword();

        if(password_verify($password, $passwordHash) === true) {
            $_SESSION['id'] = $user->getId();
            return $user;
        }

        return null;
    }


    public function getCurrentUser(): ?UserDTO
    {
        if (isset($_SESSION['id'])) {
            $user = $this->userRepository->findOneById($_SESSION['id']);
            if ($user === null) {
                return null;
            } else {
                return $user;
            }
        }
        return null;
    }
}