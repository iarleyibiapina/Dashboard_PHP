<?php

namespace App\Controller;

use App\Model\Funcionario;
use App\Utils\RenderView;
use App\Model\User;

class HomeController extends RenderView
{
    public function index()
    {
        $Funcionario = new Funcionario();
        $funcionarios = $Funcionario->get();

        $this->loadView(
            'sistema/Home',
            [
                "User" => "Iarley",
                "Title" => "Home",
                "funcionarios" => $funcionarios
            ]
        );
    }
}
