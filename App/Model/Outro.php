<?php

namespace App\Model;

class Outro extends Model
{
    // extende da Model (get, create, update, delete)

    protected $table;

    /**
     * Colunas a serem modificadas na tabelas.
     * 
     * *Deve ser definida as colunas aqui*
     *
     * @var array Cada valor é uma coluna.
     */
    protected $collums;
}
