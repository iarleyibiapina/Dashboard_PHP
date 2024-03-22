<?php

namespace App\Request;

class Request
{
    // apenas um teste


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
