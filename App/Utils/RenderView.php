<?php

namespace App\Utils;

class RenderView
{
    public function loadView($view, $args)
    {
        extract($args);
        require_once VIEW_URL . "/$view.php";
    }
}
