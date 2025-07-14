<?php

namespace App\Utils;

class RenderView
{
    public static function loadView(string $view, ?array $args = null)
    {
        // tranforma chaves de um array em variaveis.
        if($args) extract($args);
        include_once VIEW_URL . $view . '.php';
    }
}
