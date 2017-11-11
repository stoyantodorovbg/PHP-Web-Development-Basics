<?php


namespace TaskManagement\Http;

use TaskManagement\Service\UserServiceInterface;
use TaskManagement\Data\UserDTO;
use Core\DataBinderInterface;


class UserHttpHandler extends AbstractHttpHandler
{
    public function index(UserServiceInterface $userService)
    {
        $currentUser = $userService->getCurrentUser();
        if ($currentUser === null) {
            $this->render('home');
        } else {
            $this->render('allTasks', $currentUser);
        }
    }

    public function register(UserServiceInterface $userService, array $postData)
    {
        if (isset($postData['register'])) {
            $this->registerProcess($userService, $postData);
        } else {
            $this->render('registerForm');
        }
    }

    public function login(UserServiceInterface $userService, array $postData)
    {

        if (isset($postData['login'])) {
            $this->loginProcess($userService, $postData);
        } else {
            $this->render('loginPage');
        }
    }


    private function registerProcess(UserServiceInterface $userService, array $postData): void
    {
        $user = $this->dataBinder->bind($postData, UserDTO::class);
        if( $userService->register(
            $user,
            $postData['confirm_password'])) {
            $this->render('registerSuccess', $user);
        } else {
            $this->render("registerForm");
        }


    }

    public function loginProcess(UserServiceInterface $userService, array $postData)
    {
        $loggedUser = $userService->login($postData['username'], $postData['password']);

        if ($loggedUser !== null) {


            $this->redirect('dashboard.php');
        } else {
            $this->redirect('login.php');
        }
    }
}