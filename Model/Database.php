<?php

namespace App\Model;

use PDO;
use PDOException;

class Database
{
    public static function getConnection()
    {
        try {
            $pdo = new PDO(DRIVER . ': host=' . HOST . '; dbname=' . DBNAME . ';port=' . PORT, USER, PASSWORD);
            return $pdo;
        } catch (PDOException $err) {
            return $err;
        }
    }
}
