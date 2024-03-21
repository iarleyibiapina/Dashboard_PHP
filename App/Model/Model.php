<?php

namespace App\Model;

use PDO;
use PDOException;
use PDOStatement;

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
     * Método responsável por executar queries dentro do banco de dados
     * @param  string $query
     * @param  array  $params
     * @return \PDOStatement
     */
    public function execute($query, $params = [])
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
    public function create($values): void
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
            
        //MONTA QUERY 
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
            
        //EXECUTA O INSERT 
        $this->execute($query, array_values($values));

    }
    public function update($id, $datas): void
    {
        //dados da query
        $stringzao = [];
        foreach ($datas as $campo => $data) {
            $stringzao[] = "{$campo}={$data}"; 
        }
        $stringzao = implode(', ', $stringzao);
        
        //monta query
        $query = 'UPDATE ' . $this->table . ' SET ' . $stringzao . ' WHERE ' .  $this->primaryKey .'=' . $id;
        
        $stmt = $this->pdo->prepare($query);
        //executar
        var_dump($stmt->execute());
        // $this->execute($query, array_values($data));
    }
    public function delete($id): void
    {
         // MONTA QUERY
         $query = 'DELETE FROM ' . $this->table . ' WHERE ' .  $this->primaryKey .'=' . $id;

         //executa a query
         $this->execute($query);
    }
}
