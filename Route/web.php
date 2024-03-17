<?php

namespace App\Route;

class Web
{
    public static function routes()
    {
        return [
            '/'           => 'HomeController@index',
            '/teste'      => 'HomeController@teste',
            '/outro'      => 'HomeController@outro',
            '/users/'     => 'UserController@index',
            '/users/{id}' => 'UserController@show',
        ];
    }
}
