<?php

namespace application\controllers;

use application\core\AbstractController;

class MainController extends AbstractController
{
    public function indexAction() :void
    {
        $news = $this->model->getNews();
        $vars = ['news' => $news];
        $this->view->render('Главная страница', $vars);
    }

}