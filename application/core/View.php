<?php

namespace application\core;

use http\Header;
use JetBrains\PhpStorm\NoReturn;

class View
{
    const VIEWS_DIR = 'application/views/';
    private string $footer = 'layouts/footer';
    private string $header = 'layouts/header';

    private string $path;
    protected array $routeParams;
    protected string $layout = 'default';

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
        $this->path = $this->routeParams['controller'] . '/' . $this->routeParams['action'];
    }

    public function render(string $title, array $vars = []) :void
    {
        $views = [
            self::VIEWS_DIR . $this->header . '.php',
            self::VIEWS_DIR . $this->path . '.php',
            self::VIEWS_DIR . $this->footer . '.php'
        ];
        if (!empty($vars)) {
            extract($vars);
        }
        foreach ($views as $path) {
            if (file_exists($path)) {
                require $path;
            }
        }
    }

    #[NoReturn] public function redirect($url) :void
    {
        \header('location: ' . $url);
        exit();
    }

    #[NoReturn] public static function showError(int $code) :void
    {
        http_response_code($code);
        $path = self::VIEWS_DIR . 'errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit();
    }
}