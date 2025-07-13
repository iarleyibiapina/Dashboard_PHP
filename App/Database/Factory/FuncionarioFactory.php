<?php
namespace App\Database\Factory;

use DateTime;
use Override;
use App\Model\Funcionario;
use App\Database\Factory\Factory;

class FuncionarioFactory extends Factory
{
    protected $model = Funcionario::class;

    #[Override()]
    public function mapping(): array
    {
        return [
            'nome'        => "nome". rand(),
            'salario'     => random_int(0, 2000),
            'posicao'     => "posicao" . rand(),
            'escritorio'  => "escritorio" . rand(),
            'idade'       => random_int(0,100),
            'data_inicio' => (new DateTime())->format('Y-m-d'),
            'criado_em'   => (new DateTime())->format('Y-m-d'),
        ];
    }
}
