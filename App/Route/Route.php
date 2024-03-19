<?php

namespace App\Route;

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

    public static function getRoutes()
    {
        return self::$routes;
    }
}
