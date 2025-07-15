<?php

namespace App\Route;

use App\Route\Route;
use App\Controller\TesteController;
use App\Controller\Api\GraficosController;

Route::get('/api/teste',          [TesteController::class, 'testeApi']);
Route::get('/api/teste/factory',  [TesteController::class, 'testeFactory']);
Route::post('/api/teste/factory', [TesteController::class, 'testaRequest']);
Route::get('/api/graficos/pizza', [GraficosController::class, 'getGraficoPizza']);
Route::get('/api/graficos/barra', [GraficosController::class, 'getGraficoBarra']);
Route::get('/api/graficos/tabela',[GraficosController::class, 'getGraficoTabela']);
Route::get('/api/graficos/area',  [GraficosController::class, 'getGraficoArea']);

// Rotas POST para os graficos