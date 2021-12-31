<?php

namespace app\core;

use PDO;

class Database
{
    public \PDO $pdo;
    public function __construct($config = [])
    {

/*        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';*/

//        dd($dsn, $user, $password);
        $this->pdo = new \PDO("mysql:host=localhost;port=3306;dbname=mvc_framework", "root","root");

//        ($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }
}