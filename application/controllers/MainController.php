<?php

namespace application\controllers;

use application\core\AbstractController;

class MainController extends AbstractController
{

    public function indexAction()
    {
        echo 'Главная Страница';
    }

}