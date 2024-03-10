<?php

namespace App\Route;

class Web
{
    public static function routes()
    {
        return [
            '/' => 'HomeController@index',
            '/users/' => 'UserController@index',
            '/users/{id}' => 'UserController@show',
        ];
    }
}
