<?php
namespace App\Core;

class Router
{
    protected static $routes = [];
    protected static $notFoundCallback = null; // Variable to hold the 404 callback

    // Add a static route method
    public static function add($route, $callback, $middleware = null)
    {
        self::$routes[$route] = [
            'callback' => $callback,
            'middleware' => $middleware
        ];
    }

    // Method to set the 404 callback
    public static function setNotFound($callback)
    {
        self::$notFoundCallback = $callback;
    }

    public static function dispatch($url)
    {
        foreach (self::$routes as $route => $data) {
            if (preg_match("#^$route$#", $url, $matches)) {
                array_shift($matches);
                $callback = $data['callback'];
                $middleware = $data['middleware'];

                if ($middleware) {
                    $middlewareInstance = new $middleware();
                    $middlewareInstance->handle($_REQUEST, function () use ($callback, $matches) {
                        [$controller, $method] = $callback;
                        $controllerInstance = new $controller();
                        return call_user_func_array([$controllerInstance, $method], $matches);
                    });
                } else {
                    [$controller, $method] = $callback;
                    $controllerInstance = new $controller();
                    return call_user_func_array([$controllerInstance, $method], $matches);
                }
            }
        }

        // If no routes matched, call the 404 handler if set
        if (self::$notFoundCallback) {
            return call_user_func(self::$notFoundCallback);
        }

        // Default 404 response
        echo "404 - Page not found";
    }
}
