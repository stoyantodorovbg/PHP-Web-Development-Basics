<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class UserHttpHandler extends AbstractHttpHandler
{
    public function index(UserServiceInterface $userService)
    {
        $currentUser = $userService->getCurrentUser();
        if ($currentUser === null) {
            $this->render('home/index');
        } else {
            $this->render('user/profile', $currentUser);
        }
    }

    public function register(UserServiceInterface $userService, array $postData)
    {
        if (isset($postData['register'])) {
            $this->registerProcess($userService, $postData);
        } else {
            $this->render('user/register');
        }
    }

    public function login(UserServiceInterface $userService, array $postData)
    {

        if (isset($postData['login'])) {
            $this->loginProcess($userService, $postData);
        } else {
            $this->render('user/login');
        }

    }

    public function profile(UserServiceInterface $userService, array $postData = [])
    {

        $currentUser = $userService->getCurrentUser();
        if ($currentUser === null) {
            $this->redirect('login.php');
        }

        if (isset($postData['editProfile'])) {
            $this->update($userService, $postData);
        } else {
            $this->render('user/profile', $currentUser);
        }

        $this->render('user/profile', $currentUser);
    }

    public function all(UserServiceInterface $userService, array $getData)
    {
        $countUsersDto = $userService->getCountUsers();
        $count = 0;
        foreach ($countUsersDto as $i => $iv) {
            $count = intval($iv->getCount());
        }

            $users = $userService->viewPerPage($getData['p']);
            $this->render('user/users', [$users, $count]);


    }

    public function update(UserServiceInterface $userService, array $postData)
    {
        $user = $this->dataBinder->bind($postData, UserDTO::class);
        if ($userService->update($user)) {
            $this->redirect('profile.php');
        } else {
            $this->render("app/error",
                new ErrorDTO("Error editing the profile."));
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $userData
     */
    private function registerProcess(UserServiceInterface $userService, array $postData): void
    {
        $user = $this->dataBinder->bind($postData, UserDTO::class);
        if( $userService->register(
            $user,
            $postData['confirmPassword'])) {
            $this->redirect('login.php');
        } else {
            $this->render("app/error",
                new ErrorDTO("Cannot register, maybe username is already 
                taken or password mismatch"));
        }


    }

    public function loginProcess(UserServiceInterface $userService, array $postData)
    {
        $loggedUser = $userService->login($postData['username'], $postData['password']);

        if ($loggedUser !== null) {
            $_SESSION['id'] = $loggedUser->getId();

            $this->redirect('profile.php');
        } else {
            $this->render("app/error",
                new ErrorDTO("Username does not exist or
                 password mismatch."));
        }
    }
}