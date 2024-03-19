<?php

namespace App\Model;

use PDO;

/** 
 * Extends from Database, and inherit the models.
 * 
 */
class Model extends Database
{
    // criar metodos de conexao aqui para os models extender e usar;
    // cada model definira apenas o nome das colunas e tabelas;

    // estes metodos retornam dados, que podem ser usados para concatenar metodos como
    // where()->get()->create();
    private $pdo;

    /**
     * Nome da coluna para pesquisa
     * 
     * *Valor inicial vazio, sendo necessario definir a cada model*
     *
     * @var string Tabela
     */
    protected $table = '';

    /**
     * Colunas da tabela a serem modificadas
     * 
     * *Valor inicial vazio, sendo necessario definir a cada model*
     *
     * @var array Cada valor é uma coluna
     */
    protected $columns = '';


    /**
     * Chave primaria da tabela
     *
     * @var string id - Sendo seu valor padrão, pode ser modificado
     */
    protected $primaryKey = 'id';


    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Pega todos os dados do banco 
     *
     * @return array||array:null retorna os dados ou retorna nulo.
     */
    public function get(): array
    {
        $stm = $this->pdo->prepare("SELECT * FROM $this->table");
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    /**
     * Procura por uma linha no banco com base no id.
     *
     * @param int $id - Id do elemento
     * @return array|array:null retorna os dados ou retorna nulo
     */
    public function find($id): array
    {
        $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stm->bindValue(':id', $id);
        $stm->execute();
        // $stm->execute([
        //     ':id' => $id
        // ]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }


    public function where()
    {
    }

    public function select()
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
