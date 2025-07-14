<?php

namespace App\Model;

class GraficoPizza extends Model
{
    /**
     * @var string
     */
    protected $table = "dados_grafico_pizza";
    /**
     * @var array
     */
    protected $collums = [
        'legenda',
        'valor',
        'cor',
        'esta_visivel',
        'criado_em'
    ];
}
