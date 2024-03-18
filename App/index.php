<?php


require_once './vendor/autoload.php';
require_once './environment.php';

use App\Core\Core;
use App\Route\Web;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$core = new Core();
$core->run(Web::routes());
