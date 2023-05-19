<?php

namespace application\core;

class Router
{

    private array $routes = [];
    private array $params = [];
    public function __construct()
    {
        $config = require 'application/config/routes.php';
        foreach ($config as $key => $val) {
            $this->setRoutes($key, $val);
        }
    }

    private function setRoutes(string $route, array $params) :void
    {
        $route = $this->convertRouteToRegex($route);
        $this->routes[$route] = $params;
    }

    private function match() :bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $routeRegex => $params) {
            if (preg_match($routeRegex, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {

                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo "Не найден Экшен: $action.";
                }
            } else {
                echo "Не найден Контролер: $path.";
            }
        } else {
            echo "Не найден Маршрут.";
        }
    }

    private function convertRouteToRegex(string $route) :string
    {
        return '#^' . $route . '$#';
    }
}