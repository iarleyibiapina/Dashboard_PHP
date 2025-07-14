<?php
require_once __DIR__ . '/vendor/autoload.php'; # 

use App\Core\Config;
use App\Core\Core;
use App\Facade\Log;
use App\Route\Route;
// 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
// 
$Config = new Config();
define('PROJECT_ROOT', __DIR__);
$Config->defineConstants();
date_default_timezone_set($Config->timezone());
Log::setPath($Config->storagePath());
Route::setMappedRoutes($Config);
// 
$core = new Core();
$core->run(Route::getRoutes());

