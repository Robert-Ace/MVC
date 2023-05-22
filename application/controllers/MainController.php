<?php

namespace application\controllers;

use application\core\AbstractController;

class MainController extends AbstractController
{
    public function indexAction() :void
    {
        $vars = ['name' => 'Роберт', 'age' => 37];
        $this->view->render('Главная страница', $vars);
    }

}