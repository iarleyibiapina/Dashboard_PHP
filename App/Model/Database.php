<?php

namespace App\Model;

use PDO;
use PDOException;

class Database
{
    public static function getConnection()
    {
        try {
            $pdo = new PDO($_ENV['DBDRIVER'] . ': host=' . $_ENV['DBHOST'] . '; dbname=' . $_ENV['DBNAME'] . ';port=' . $_ENV['DBPORT'], $_ENV['DBUSER'], $_ENV['DBPASSWORD']);
            return $pdo;
        } catch (PDOException $err) {
            return $err;
        }
    }
}
