<?php

namespace App\Route;

use App\Route\Route;

Route::get('/api/teste', 'TesteController@testeApi');
Route::get('/api/teste/factory', 'TesteController@testeFactory');
