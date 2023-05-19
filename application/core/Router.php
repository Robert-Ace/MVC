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

    private function setParams(array $params) :void
    {
        $this->params = $params;
    }

    private function hasMatchUrl() :bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $routeRegex => $params) {
            if (preg_match($routeRegex, $url, $matches)) {
                $this->setParams($params);
                return true;
            }
        }
        return false;
    }

    public function run() :void
    {
        if ($this->hasMatchUrl()) {
            $className = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($className)) {

                $action = $this->params['action'] . 'Action';
                if (method_exists($className, $action)) {
                    $controller = new $className($this->params);
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