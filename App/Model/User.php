<?php

namespace App\Model;

class User extends Model
{
    // extende da Model (get, create, update, delete)


    /**
     * Define o nome da tabela para consultas
     *
     * @var string Nome tabela
     */
    protected $table = "users";

    /**
     * Colunas a serem modificadas na tabelas.
     * 
     * *Deve ser definida as colunas aqui*
     *
     * @var array Cada valor é uma coluna.
     */
    protected $collums;
}
