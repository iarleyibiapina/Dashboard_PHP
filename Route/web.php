<?php

namespace App\Route;

$routes = [
    '/' => 'HomeController@index',
    '/users/' => 'UserController@index',
    '/users/{id}' => 'UserController@show',
];
