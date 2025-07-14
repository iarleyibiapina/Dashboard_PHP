<?php

namespace App\Controller;

use App\Utils\RenderView;

class ChartController extends Controller
{
    public function index()
    {
        RenderView::loadView(
            'sistema/charts',
            [
                "User" => "Iarley",
                "title" => "Charts - SB Admin",
            ]
        );
    }
}
