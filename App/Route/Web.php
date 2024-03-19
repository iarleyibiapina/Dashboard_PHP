<?php

namespace App\Route;

class Web
{
    public static function routes()
    {
        return [
            '/'           => 'IndexController@index',
            '/home'       => 'HomeController@index',
            '/teste'      => 'HomeController@teste',
            '/charts'     => 'ChartController@index',
            '/table'      => 'TableController@index',
            '/outro'      => 'HomeController@outro',
            '/users/'     => 'UserController@index',
            '/users/{id}' => 'UserController@show',
        ];
    }
}
