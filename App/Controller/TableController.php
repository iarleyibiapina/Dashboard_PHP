<?php

namespace App\Controller;

use App\Utils\RenderView;
use App\Model\Funcionario;

class TableController extends RenderView
{
    public function index()
    {
        $Funcionario = new Funcionario();
        $funcionarios = $Funcionario->get();
        $this->loadView(
            'sistema/tables',
            [
                "User" => "Iarley",
                "title" => "Tables - SB Admin",
                "funcionarios" => $funcionarios
            ]
        );
    }
}
