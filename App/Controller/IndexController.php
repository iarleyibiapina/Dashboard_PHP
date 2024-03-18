<?php

namespace App\Controller;

use App\Utils\RenderView;

class IndexController extends RenderView
{
    public function index(){
        $this->loadView(
            'index',
            []
        );
    }
}
