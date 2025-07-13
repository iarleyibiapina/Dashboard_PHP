<?php

require_once __DIR__ . '/App/vendor/autoload.php'; # 
require_once __DIR__ . '/App/Core/Utils.php'; #
require_once __DIR__ . '/environment.php';

use App\Core\Config;
use App\Core\Core;
use App\Route\Route;

date_default_timezone_set("America/Fortaleza");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

Route::setMappedRoutes(new Config());

$core = new Core();
$core->run(Route::getRoutes());

