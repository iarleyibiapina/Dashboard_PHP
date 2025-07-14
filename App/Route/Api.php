<?php

namespace App\Route;

use App\Route\Route;

Route::get('/api/teste', 'TesteController@testeApi');
Route::get('/api/teste/factory', 'TesteController@testeFactory');
Route::post('/api/teste/factory', 'TesteController@testaRequest');
Route::get('/api/graficos/pizza', 'GraficosController@getGraficoPizza');
Route::get('/api/graficos/barra', 'GraficosController@getGraficoBarra');
Route::get('/api/graficos/tabela', 'GraficosController@getGraficoTabela');
Route::get('/api/graficos/area', 'GraficosController@getGraficoArea');
