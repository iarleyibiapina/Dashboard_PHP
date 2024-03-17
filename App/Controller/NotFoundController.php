<?php

namespace App\Controller;

class NotFoundController
{
    public function index()
    {
        include VIEW_URL . 'sistema/partials/404.php';
    }

    public function code404()
    {
        include VIEW_URL . 'sistema/partials/404.php';
    }
    public function code401()
    {
        include VIEW_URL . 'sistema/partials/401.php';
    }

    public function code500()
    {
        include VIEW_URL . 'sistema/partials/500.php';
    }
}
