<?php

namespace App\Controller;

use Exception;
use App\Facade\Log;
use App\Model\Model;
use App\Database\Factory\FuncionarioFactory;

/**
 * Classe de testes
 * 
 */
class TesteController extends Controller
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
        // FuncionarioFactory::count(5);
    }

    public function testaLog()
    {
        try {
            throw new Exception("sad");
        } catch (Exception $e) {            
            Log::error($e->getMessage(), [
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        }
    }

    public function testaLogFuncao()
    {
        try {
            throw new Exception("sad");
        } catch (Exception $e) {            
            logException($e);
        }
    }

    public function testaRequest()
    {
        dd($this->request->input('teste'));
    }
}
