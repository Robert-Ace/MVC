<?php

namespace application\controllers;

use application\core\AbstractController;

class MainController extends AbstractController
{
    public function indexAction() :void
    {
        $vars = $this->model->getNews();
        $this->view->render('Главная страница', $vars);
    }

}