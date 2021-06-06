<?php

$configDb = require_once 'configDb.php';

class ConnectDb
{
    private $pdo;

    public function __construct()
    {
        global $configDb;

        $dsn = "mysql:host={$configDb['host']};dbname={$configDb['database']};charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->pdo = new PDO($dsn, $configDb['user'], $configDb['password'], $options);
    }

    public function getPDO() : PDO
    {
        return $this->pdo;
    }
}