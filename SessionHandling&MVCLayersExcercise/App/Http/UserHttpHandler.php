<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class UserHttpHandler extends AbstractHttpHandler
{
    public function index(UserServiceInterface $userService, array $formData)
    {
        $currentUser = $userService->getCurrentUser();
        if ($currentUser === null) {
            $this->render('/home/index');
        } else {
            $this->render('/user/profile', $currentUser);
        }

    }

    public function register(UserServiceInterface $userService, array $formData)
    {
        if (isset($formData['register'])) {
            $this->registerProcess($userService, $formData);
        } else {
            $this->render('/user/register');
        }
    }

    public function login(UserServiceInterface $userService, array $formData)
    {

        if (isset($formData['login'])) {
            $this->loginProcess($userService, $formData);
        } else {
            $this->render('/user/login');
        }

    }

    public function profile(UserServiceInterface $userService, array $formData = [])
    {

        $currentUser = $userService->getCurrentUser();
        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if (isset($formData['editProfile'])) {
            $this->update($userService, $formData);
        } else {
            $this->render('/user/profile', $currentUser);
        }

        $this->render('/user/profile', $currentUser);
    }

    public function all(UserServiceInterface $userService)
    {
        $users = $userService->viewAll();
        $this->render('/user/users', $users);
    }

    public function update(UserServiceInterface $userService, array $formData)
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        if ($userService->update($user)) {
            $this->redirect('profile.php');
        } else {
            $this->render("/app/error",
                new ErrorDTO("Error editing the profile."));
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $userData
     */
    private function registerProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        if( $userService->register(
            $user,
            $formData['confirmPassword'])) {
            $this->redirect('login.php');
        } else {
            $this->render("/app/error",
                new ErrorDTO("Cannot register, maybe username is already 
                taken or password mismatch"));
        }


    }

    public function loginProcess(UserServiceInterface $userService, array $formData)
    {
        $loggedUser = $userService->login($formData['username'], $formData['password']);

        if ($loggedUser !== null) {
            $_SESSION['id'] = $loggedUser->getId();

            $this->redirect('profile.php');
        } else {
            $this->render("/app/error",
                new ErrorDTO("Username does not exist or
                 password mismatch."));
        }
    }
}