<?php

namespace App\Core;

use App\Request\Request;

// Implementar melhor URL com metodos, verificar se input hidden _method ou se getmethod();

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;
        $routerFound = false;

        foreach ($routes as $route) {
            // expressao regular para url
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $route['path']) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routerFound = true;

                [$currentController, $action] = explode('@', $route['action']);

                $callController = '\\App\\Controller\\' . $currentController;

                try {
                    call_user_func_array([new $callController, $action], [$matches]);
                } catch (\Throwable $th) {
                    self::notFound(500);
                }
            }
        }

        if (!$routerFound) {
            self::notFound(404);
        }
    }

    /**
     * Retorna uma pagina de erro com base no codigo enviado pelo parametro.
     *
     * @param integer $code Codigo de erro.
     * @return void Uma pagina de erro com base no codigo enviado.
     */
    private static function notFound(int $code = 500)
    {
        $methodError = 'code' . $code;
        $notFound = '\\App\\Controller\\NotFoundController';
        call_user_func_array([new $notFound, $methodError], []);
    }
}
