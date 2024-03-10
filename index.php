<?php

// https://www.youtube.com/watch?v=jamKWbvmerQ&list=PLFie3VxXISbV3k9NPr-wXlk6CU4ypOIBt&index=8

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/environment.php';
require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/routers/routes.php';

use App\Core\Core;

spl_autoload_register(function ($file) {
    if (file_exists(__DIR__ . "/utils/$file.php")) {
        require_once __DIR__ . "/utils/$file.php";
    } else if (file_exists(__DIR__ . "/models/$file.php")) {
        require_once __DIR__ . "/models/$file.php";
    }
});

$core = new Core();
$core->run($routes);
