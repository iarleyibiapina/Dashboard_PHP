<?php

namespace App\Controller;

use App\Utils\RenderView;
use App\Model\Funcionario;

class TableController extends Controller
{
    public function index()
    {
        $Funcionario = new Funcionario();
        $funcionarios = $Funcionario->get();
        RenderView::loadView(
            'sistema/tables',
            [
                "User" => "Iarley",
                "title" => "Tables - SB Admin",
                "funcionarios" => $funcionarios
            ]
        );
    }
}
