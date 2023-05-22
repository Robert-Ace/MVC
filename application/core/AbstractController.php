<?php

namespace application\core;

use application\core\View;
use application\lib\Db;

abstract class AbstractController
{
    public array $routeParams;
    public View $view;
    private Db $db;

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
        $this->view = new View($routeParams);
        $this->db = new Db();
    }
}