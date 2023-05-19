<?php

namespace application\controllers;

use application\core\AbstractController;
class AccountController extends AbstractController
{

    public function loginAction()
    {
        $this->view->render('Страница Авторизации');
    }
    public function registerAction()
    {
        $this->view->render('Страница Регистрации');
    }
}