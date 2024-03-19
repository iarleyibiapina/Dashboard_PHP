<?php

namespace App\Route;

use App\Route\Route;

/**
 * Retorna um array com 3 chaves
 * 
 *  @return array ['path' => '', 'action' =>'', 'method' => ''];
 */
Route::get('/', 'IndexController@index');
Route::get('/password', 'IndexController@password');
Route::get('/register', 'IndexController@register');
Route::post('/register', 'IndexController@create');
Route::get('/home',     'HomeController@index');
// 
Route::get('/teste',         'UserController@teste');
Route::get('/teste/{id}',    'UserController@show');
// 
Route::get('/charts',   'ChartController@index');
Route::get('/table',    'TableController@index');
Route::get('/outro',    'UserController@show');
Route::get('/users',          'UserController@index');
Route::get('/users/{id}',    'UserController@show');
// Route::get('/users/{id}/show', 'HomeController@show');
// Route::put('/create', 'HomeController@update');
// Route::delete('/create', 'HomeController@delete');
