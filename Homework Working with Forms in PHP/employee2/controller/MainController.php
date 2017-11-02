<?php

class MainController extends Controller
{

    public function main()
    {
        $this->loadView('common/header.php');
        $this->loadView('common/main.php');
        $this->loadView('common/footer.php');
    }

}