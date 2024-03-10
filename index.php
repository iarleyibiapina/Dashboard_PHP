<?php

require_once './vendor/autoload.php';
require_once './environment.php';

use App\Core\Core;
use App\Route\Web;

$core = new Core();
$core->run(Web::routes());
