<?php

namespace App\Controller;

use App\Utils\RenderView;

class HomeController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'index',
            []
        );
    }
}
