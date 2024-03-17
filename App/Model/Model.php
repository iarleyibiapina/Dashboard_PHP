<?php

namespace App\Model;

/** 
 * Extends from Database, and inherit the models.
 * 
 */
class Model extends Database
{
    // herda conexão pdo

    // criar metodos de conexao aqui para os models extender e usar;
    // cada model definira apenas o nome das colunas e tabelas;


    // estes metodos retornam dados, que podem ser usados para concatenar metodos como
    // where()->get()->create();
    public function get()
    {
    }

    public function find()
    {
    }
    public function where()
    {
    }
    public function create(): void
    {
    }
    public function update(): void
    {
    }
    public function delete(): void
    {
    }
}
