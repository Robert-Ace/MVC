<?php

namespace application\controllers;

use application\core\AbstractController;
class AccountController extends AbstractController
{

    public function loginAction() :void
    {
        $this->view->render('Страница Авторизации');
    }
    public function registerAction() :void
    {
        $this->view->render('Страница Регистрации');
    }
}