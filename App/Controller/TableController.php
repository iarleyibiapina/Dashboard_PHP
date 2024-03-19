<?php

namespace App\Controller;

use App\Utils\RenderView;

class TableController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'sistema/tables',
            [
                "User" => "Iarley",
                "title" => "Tables - SB Admin",
            ]
        );
    }
}
