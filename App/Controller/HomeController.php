<?php

namespace App\Controller;

use App\Utils\RenderView;
use App\Model\User;

class HomeController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'index',
            []
        );
    }

    public function teste()
    {
        $teste = new User();
        $outro = $teste->get();
        var_dump($outro);
    }
}
