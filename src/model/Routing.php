<?php

class Routing
{
    private $routes = [];
    private $currentRoute = '';

    public function __construct($routes)
    {
        $this->routes = $routes;
        $this->currentRoute = '/'.$this->getCurrentRoute();
    }

    public function getControllerName()
    {
        if (array_key_exists($this->currentRoute, $this->routes)){
            return $this->routes[$this->currentRoute];
        }

        return $this->routes['/'];
    }

    private function getCurrentRoute()
    {
        return empty($_GET['route']) ? '/' : $_GET['route'];
    }
}
