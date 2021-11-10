<?php
namespace VV;

class Router
{

    protected $routes = [];

    public function addRoute(Route $route)
    {
        if (!array_key_exists($route->getUrl(), $this->routes)) {
            $this->routes[$route->getUrl()] = $route;
        }
    }

    public function getRoute($url)
    {
        return $this->routes[$url] ?? new Route();
    }

    public function path($module, $action, $vars = [])
    {
        foreach ($this->routes as $route) {
            if (strtolower($route->getModule()) == strtolower($module) && strtolower($route->getAction()) == strtolower($action)) {
                $chaine = "";
                foreach ($vars as $cle => $val) {
                    $chaine .= "$cle\\$val";
                }
                return $chaine ? $route->getUrl() . "\\" . $chaine : $route->getUrl();
            }
        }
    }
}