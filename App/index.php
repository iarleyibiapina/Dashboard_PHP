<?php


require_once './vendor/autoload.php';
require_once './environment.php';
require_once './Route/Web.php';

use App\Core\Core;
use App\Route\Route;

date_default_timezone_set("America/Fortaleza");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$core = new Core();
$core->run(Route::getRoutes());
