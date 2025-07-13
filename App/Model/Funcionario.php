<?php

namespace App\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";
    protected $collums = [
        'nome',
        'salario',
        'posicao',
        'escritorio',
        'idade',
        'data_inicio',
        'criado_em',
    ];
}
