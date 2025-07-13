<?php
require_once __DIR__ . '/App/vendor/autoload.php'; # 
require_once __DIR__ . '/environment.php';
require_once __DIR__ . '/App/Utils/Functions.php'; # ! composer file ja deveria lidar

use App\Core\Config;
use App\Core\Core;
use App\Facade\Log;
use App\Route\Route;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$Config = new Config();

date_default_timezone_set($Config->timezone());

Log::setPath($Config->storagePath()['path']);

Route::setMappedRoutes($Config);

$core = new Core();
$core->run(Route::getRoutes());

