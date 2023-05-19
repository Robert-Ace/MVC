<?php

namespace application\core;

class View
{
    public string $path;
    public array $routeParams;
    public string $layout = 'default';

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
        $this->path = $this->routeParams['controller'] . '/' . $this->routeParams['action'];
    }

    public function render(string $title, array $vars = [])
    {
        require 'application/views/layouts/header.php';
        require 'application/views/' . $this->path . '.php';
        require 'application/views/layouts/footer.php';
    }
}