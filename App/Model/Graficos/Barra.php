<?php

namespace App\Model\Graficos;

use App\Model\Model;

class Barra extends Model
{
    /**
     * @var 
     */
    protected $table = "grafico_legendas";
    /**
     * @var array
     */
    protected $collums = [
        "nome",
        "criado_em"
    ];
}
