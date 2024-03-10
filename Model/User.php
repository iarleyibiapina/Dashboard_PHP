<?php

namespace App\Model;

use PDO;
use App\Model\Database;

class UserModel extends Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function get()
    {
        $stm = $this->pdo->query("SELECT * FROM users");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function getUser($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        // $stm = $this->pdo->query("SELECT * FROM nometabela WHERE pk_cod = $id");
        $stm->execute([
            ':id' => $id
        ]);
        // $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}
