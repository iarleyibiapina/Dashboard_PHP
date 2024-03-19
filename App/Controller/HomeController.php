<?php

namespace App\Controller;

use App\Utils\RenderView;
use App\Model\User;

class HomeController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'sistema/Home',
            [
                "User" => "Iarley",
                "Title" => "Home",
            ]
        );
    }
}
