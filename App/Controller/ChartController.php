<?php

namespace App\Controller;

use App\Utils\RenderView;

class ChartController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'sistema/charts',
            [
                "User" => "Iarley",
                "title" => "Charts - SB Admin",
            ]
        );
    }
}
