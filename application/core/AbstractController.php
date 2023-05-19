<?php

namespace application\core;

use application\core\View;

abstract class AbstractController
{
    public array $routeParams;
    public View $view;
    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
        $this->view = new View($routeParams);
    }
}