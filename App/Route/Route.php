<?php

namespace App\Route;

use App\Core\Config;
use App\Controller\Controller;

// como pegar o _method?
// criar classe request e pegar o method.

// pode receber como action 'Controller@metodo' ou [Controller::class, 'metodo']
class Route
{
    // receber um 3 parametro para pegar o methodo do formulario
    // enviar o methodo via _method
    private static array $routes = [];

    /**
     * @param string $path
     * @param string|array{
     *      Controller,
     *      string
     * } $action
     * @return void
     */
    public static function get(string $path, string|array $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'GET',
        ];
    }
    /**
     * @param string $path
     * @param string|array{
     *      Controller,
     *      string
     * } $action
     * @return void
     */
    public static function post(string $path, string|array $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'POST',
        ];
    }
    /**
     * @param string $path
     * @param string|array{
     *      Controller,
     *      string
     * } $action
     * @return void
     */
    public static function put(string $path, string|array $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'PUT',
        ];
    }
    /**
     * @param string $path
     * @param string|array{
     *      Controller,
     *      string
     * } $action
     * @return void
     */
    public static function delete(string $path, string|array $action)
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
