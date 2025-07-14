<?php

namespace App\Controller;

use App\Utils\RenderView;

class NotFoundController
{
    public function index()
    {
        RenderView::loadView(
            'sistema/partials/404'
        );
    }

    public function code404()
    {
        RenderView::loadView(
            'sistema/partials/404'
        );
    }
    public function code401()
    {
        RenderView::loadView(
            'sistema/partials/401'
        );
    }

    public function code500()
    {
        RenderView::loadView(
            'sistema/partials/500'
        );    
    }
}
