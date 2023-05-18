<?php

namespace application\controllers;

use application\core\AbstractController;
class AccountController extends AbstractController
{

    public function loginAction()
    {
        echo 'Страница входа';
    }
    public function registerAction()
    {
        echo 'Страница регистрации';
    }
}