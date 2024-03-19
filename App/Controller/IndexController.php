<?php

namespace App\Controller;

use App\Utils\RenderView;

class IndexController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'index',
            [
                'title' => 'Login - SB Admin',
            ]
        );
    }

    public function password()
    {
        $this->loadView(
            'password',
            [
                'title' => 'Password - SB Admin',
            ]
        );
    }

    public function register()
    {
        $this->loadView(
            'register',
            [
                'title' => 'Register - SB Admin',
            ]
        );
    }
}
