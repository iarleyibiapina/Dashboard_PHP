<?php

namespace App\Core;

class Request
{
    // apenas um teste
    // define um valor nulo caso nao ache
    // procura pelo _POST enviado no formulario se nao encontrado
    // procura em todo o 'input' enviado por uma api
    public function input(string $key, string $default = null)
    {
        static $all_inputs = null; // armazena dados estaticos, uma forma de 'cache' nao le o corpo varia vezes
        // durante a mesma requisicao

        if($all_inputs === null){
            if (!empty($_POST)) {
                $all_inputs = $_POST;
            } else {
                $json_body  = file_get_contents('php://input'); // pega o json enviado
                // se json invalido ou vazio, retorna [], retorna valores em um array associativo
                $all_inputs = json_decode($json_body, true) ?? []; 
            }
        }
        return $all_inputs[$key] ?? null;
    }

    /**
     * Pegar o body da request e seu metodo.
     *
     * @return array
     */
    public static function getRequest()
    {
        $data = isset($_REQUEST) ? $_REQUEST : array();
        array_shift($data); // tira chave url
        return [
            "data"       => $data,
            "methodForm" => self::getMethodForm(),
            "method"     => self::getMethod()
        ];
    }
    /**
     * Pega metodo enviado por meio do formulario
     *
     * @return string
     */
    public static function getMethodForm()
    {
        return isset($_REQUEST["_method"]) ? $_REQUEST["_method"] : '';
    }

    /** 
     * Pega metodo
     */
    public static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}
