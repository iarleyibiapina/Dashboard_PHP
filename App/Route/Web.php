<?php

namespace App\Route;

use App\Route\Route;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\ChartController;
use App\Controller\IndexController;
use App\Controller\TableController;
use App\Controller\TesteController;

/**
 * Retorna um array com 3 chaves
 * 
 *  @return array ['path' => '', 'action' =>'', 'method' => ''];
 */

// Dashboard
Route::get('/',              [IndexController::class, 'index']);
Route::get('/password',      [IndexController::class, 'password']);
Route::get('/register',      [IndexController::class, 'register']);
Route::post('/register',     [IndexController::class, 'create']);
Route::get('/home',          [HomeController::class,  'index']);
Route::get('/charts',        [ChartController::class, 'index']);
Route::get('/table',         [TableController::class, 'index']);
// Testes
Route::get('/testaConexao',  [TesteController::class, 'testaConexao']);
// Usando model usuario
Route::get('/users',           [UserController::class ,'index']);
Route::post('/users/{id}',     [UserController::class ,'create']);
Route::get('/users/{id}',      [UserController::class ,'show']);
Route::get('/users/{id}/show', [HomeController::class ,'show']);
Route::get('/teste/{id}',      [UserController::class ,'show']);

Route::post('/create',            [UserController::class, 'create']);
Route::put('/update/{id}',        [UserController::class, 'update']);
Route::delete('/delete/{id}',     [UserController::class, 'delete']);
// 
Route::get('/outro',              [UserController::class,'show']);
