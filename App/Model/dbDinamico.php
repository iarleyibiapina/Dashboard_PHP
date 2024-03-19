<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{
    /**
     *Host de conexao com o banco de dados
     *@var string
     **/
    const HOST = 'localhost';
    /**  
     *Nome do baco de dados
     *@var string
     **/
    const NAME = 'poopdo';
    /**
     *usuario do banco de dados
     *@var string
     **/
    const USER = 'root';
    /**
     *senha do banco de dados
     *@var string
     **/
    const PASS = '';
    /**
     *nome da tabela do banco de dados
     *@var string
     **/
    private $table = 'vagas';

    /**
     *instancia de conexao com o banco de dados
     *@var PDO
     **/
    private $connection;
    /** 
     *define a tabela e instancia
     *@param string @table
     **/
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    /**
     * metodo responsavel por criar uma conexao com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
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
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
    /**
     * metodo responsavel por inserir dados no banco
     * @param array @values [field => value]
     * @return integer ID inserido
     */
    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //MONTA QUERY 
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        //EXECUTA O INSERT 
        $this->execute($query, array_values($values));

        //retorna o id inserido
        return $this->connection->lastInsertId();
    }
    /**
     * metodo responsavel por executar uma consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return \PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //MONTA A QUERY
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $order . ' ' . $limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }
    /**
     * metodo responsavel por executar as atualizações no banco de dados
     * @param string $where
     * @param array $values [ field => value]
     * @return boolean
     */
    public function update($where, $values)
    {
        //dados da query
        $fields = array_keys($values);

        //monta query
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        //executar
        $this->execute($query, array_values($values));

        //retorna sucessso
        return true;
    }
    /**
     * metodo responsavel por excluir dados do banco
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {
        // MONTA QUERY
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        //executa a query
        $this->execute($query);

        //retorna sucesso
        return true;
    }
}
