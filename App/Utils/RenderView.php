<?php

namespace App\Utils;

class RenderView
{
    public function loadView($view, $args)
    {
        // tranforma chaves de um array em variaveis.
        extract($args);
        require_once VIEW_URL . "/$view.php";
    }
}
