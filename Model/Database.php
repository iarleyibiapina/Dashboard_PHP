<?php

namespace App\Model;

use PDO;
use PDOException;

class Database
{
    public static function getConnection()
    {
        try {
            $pdo = new PDO("mysql:dbname=teste;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $err) {
            return $err;
        }
    }
}
