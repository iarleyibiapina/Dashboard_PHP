<?php

namespace App\Model;

use PDO;
use PDOException;
use PDOStatement;

/** 
 * Extends from Database, and inherit the models.
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
    protected $collums = '';


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
     *  Testa conexao
     * 
     * @return \PDO
     */
    public function isConected(): PDO
    {
        return $this->pdo;
    }

    /**
     * Método responsável por executar queries dentro do banco de dados 
     * @param  string $query
     * @param  array  $params
     * @return \PDOStatement
     */
    public function modelExecute($query, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
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
        $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE $this->primaryKey = :idBind");
        $stm->bindValue(':idBind', $id);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return $stm->fetch(PDO::FETCH_ASSOC);
        } else {
            return ["error" => "Id não existente"];
        }
    }


    public function where()
    {
    }

    /* TRABALHAS AINDA */
    public function create($values): void
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        // cria ? com base no tamanho do array
        $binds = array_pad([], count($fields), '?');

        //MONTA QUERY 
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        //EXECUTA O INSERT, e fazendo o tratamento de dados no execute; 
        $this->modelExecute($query, array_values($values));
    }
    /* TRABALHAR AINDA */

    /**
     * Usar colunas ja definidas pela model
     *
     * @param int $id
     * @param array $datas
     * @return void
     */
    public function update($id, $datas): void
    {
        //dados da query
        $stringzao = [];
        foreach ($datas as $campo => $data) {
            // se string usar '' senao nao usar '';
            if (gettype($data) == 'string') {
                $stringzao[] = "{$campo}='{$data}'";
            } else {
                $stringzao[] = "{$campo}={$data}";
            }
        }
        $stringzao = implode(', ', $stringzao);

        // colunas
        // $this->collums;

        //monta query
        $query = 'UPDATE teste.' . $this->table . ' SET ' . $stringzao . ' WHERE ' .  $this->primaryKey . '= :idBind';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':idBind', $id);

        //executar
        $stmt->execute();
    }
    public function delete($id): void
    {
        // MONTA QUERY
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' .  $this->primaryKey . '= :idBind';

        //executa a query
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':idBind', $id);
        $stmt->execute();
    }
}
