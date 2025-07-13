<?php

namespace App\Controller;

use App\Database\Factory\FuncionarioFactory;
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
        die(var_dump($resultado));
    }

    public function testeApi()
    {   
        echo json_encode([
            "teste" => true
        ]);
    }

    public function testeFactory()
    {
        // FuncionarioFactory::create();
        FuncionarioFactory::count(5);
    }
}
