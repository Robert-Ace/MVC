<?php

namespace application\core;

abstract class AbstractController
{
    public $route;
    public function __construct($route)
    {
        $this->route = $route;
    }
}