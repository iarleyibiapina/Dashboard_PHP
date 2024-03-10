<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Utils\RenderView;

class UserController extends RenderView
{
    public function index()
    {
        $this->loadView(
            'user',
            []
        );
    }

    public function show($id)
    {
        $id_user = $id[0];
        $user = new UserModel();

        $this->loadView(
            'user',
            ['user' => $user->getUser($id_user)]
        );
    }
}
