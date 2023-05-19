<?php

namespace application\core;

class Router
{

    private array $routes = [];
    private array $routeParams = [];
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

    private function setRouteParams(array $params) :void
    {
        $this->routeParams = $params;
    }

    private function hasMatchUrl() :bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $routeRegex => $params) {
            if (preg_match($routeRegex, $url, $matches)) {
                $this->setRouteParams($params);
                return true;
            }
        }
        return false;
    }

    public function run() :void
    {
        if ($this->hasMatchUrl()) {
            $className = 'application\controllers\\' . ucfirst($this->routeParams['controller']) . 'Controller';
            if (class_exists($className)) {

                $action = $this->routeParams['action'] . 'Action';
                if (method_exists($className, $action)) {
                    $controller = new $className($this->routeParams);
                    $controller->$action();
                } else {
                    echo "Не найден Экшен: $action.";
                }

            } else {
                echo "Не найден Контролер: $className.";
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