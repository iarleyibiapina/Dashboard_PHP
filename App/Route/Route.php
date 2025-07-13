<?php

namespace App\Route;

use App\Core\Config;

// como pegar o _method?
// criar classe request e pegar o method.

class Route
{
    // receber um 3 parametro para pegar o methodo do formulario
    // enviar o methodo via _method
    private static array $routes = [];

    public static function get(string $path, string $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'GET',
        ];
    }
    public static function post(string $path, string $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'POST',
        ];
    }
    public static function put(string $path, string $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'PUT',
        ];
    }
    public static function delete(string $path, string $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'DELETE',
        ];
    }

    public static function setMappedRoutes(Config $config)
    {
        foreach($config->mapRoutes() as $pathRoute){
            require_once __DIR__ . $pathRoute;
        }
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}
