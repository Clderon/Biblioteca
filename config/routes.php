<?php

class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        $url = explode('/', trim(URL, '/'));

        $this->controller = !empty($url[0])  ? ucfirst($url[0]) : 'Home';
        $this->method = !empty($url[1]) ?  $url[1] : 'index';
        $this->controller = $this->controller . 'Controller';

        include_once __DIR__ . "/../app/Controllers/" . $this->controller . ".php";
    }

    public function run()
    {

        $controllerClass = 'App\Controllers\\' . $this->controller;

        $controller = new $controllerClass();
        $method = $this->method;
        $controller->$method();
    }
}
