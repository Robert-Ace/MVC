<?php

namespace application\core;

use application\core\View;
use application\lib\Db;

abstract class AbstractController
{
    protected array $routeParams;
    protected View $view;
    protected mixed $model;

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
        $this->view = new View($routeParams);
        $this->model = $this->loadModel($routeParams['controller']);
    }

    private function loadModel($name)
    {
        $className = 'application\\models\\' . ucfirst($name);
        if (class_exists($className)) {
            return new $className;
        }
    }
}