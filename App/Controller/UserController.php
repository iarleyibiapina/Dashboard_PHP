<?php

namespace App\Controller;

use App\Model\User;
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
        print($id_user);
        $user = new User();
        $resultado = $user->find($id_user);
        var_dump($resultado);
    }

    public function teste()
    {
        $teste = new User();
        $outro = $teste->get();
        var_dump($outro);
    }
}
