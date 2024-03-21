<?php

namespace App\Controller;

use App\Model\Model;

/**
 * Classe de testes
 * 
 */
class TesteController
{
    public function testaConexao()
    {
        print("Check");
        $userModel = new Model();
        $resultado = $userModel->isConected();
        var_dump($resultado);
    }
}
