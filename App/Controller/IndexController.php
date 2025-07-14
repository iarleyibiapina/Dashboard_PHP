<?php

namespace App\Controller;

use App\Utils\RenderView;

class IndexController extends Controller
{
    public function index()
    {
        RenderView::loadView(
            'index',
            [
                'title' => 'Login - SB Admin',
            ]
        );
    }

    public function password()
    {
        RenderView::loadView(
            'password',
            [
                'title' => 'Password - SB Admin',
            ]
        );
    }

    public function register()
    {
        RenderView::loadView(
            'register',
            [
                'title' => 'Register - SB Admin',
            ]
        );
    }
}
