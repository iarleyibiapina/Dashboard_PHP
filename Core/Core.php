<?php

namespace App\Core;

use App\Controller\NotFoundController;

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;
        $routerFound = false;

        foreach ($routes as $route => $controller) {
            // expressao regular para url
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $route) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                // require_once __DIR__ . "/../Controller/$currentController.php";
                // var_dump($currentController);
                // usar call_user_func;
                $callController = '\\App\\Controller\\' . $currentController;
                $newController = new $callController();
                // $newController = new $currentController();
                $newController->$action($matches);
            }
        }

        if (!$routerFound) {
            // require_once __DIR__ . "/../Controller/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
