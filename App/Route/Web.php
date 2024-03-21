<?php

namespace App\Route;

use App\Route\Route;

/**
 * Retorna um array com 3 chaves
 * 
 *  @return array ['path' => '', 'action' =>'', 'method' => ''];
 */

// Dashboard
Route::get('/',              'IndexController@index');
Route::get('/password',      'IndexController@password');
Route::get('/register',      'IndexController@register');
Route::post('/register',     'IndexController@create');
Route::get('/home',          'HomeController@index');
Route::get('/charts',         'ChartController@index');
Route::get('/table',          'TableController@index');
// Testes
Route::get('/testaConexao',  'TesteController@testaConexao');
// Usando model usuario
Route::get('/users',         'UserController@index');
Route::get('/users/{id}',     'UserController@show');
Route::get('/users/{id}/show', 'HomeController@show');
Route::get('/teste/{id}',    'UserController@show');

Route::post('/create',       'UserController@create');
Route::put('/update',        'UserController@update');
Route::delete('/delete',     'UserController@delete');
// 
Route::get('/outro',          'UserController@show');
