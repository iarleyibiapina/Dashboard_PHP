<?php

namespace App\Controller;

use App\Model\User;
use App\Utils\RenderView;
use App\Model\Funcionario;
use App\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $Funcionario = new Funcionario();
        $funcionarios = $Funcionario->get();

        RenderView::loadView(
            'sistema/Home',
            [
                "User" => "Iarley",
                "Title" => "Home",
                "funcionarios" => $funcionarios
            ]
        );
    }
}
