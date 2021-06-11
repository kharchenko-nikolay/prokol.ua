<?php

$configDb = require_once 'configDb.php';

class ConnectDb
{
    private $pdo;

    public function __construct()
    {
        global $configDb;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->pdo = new PDO($configDb['dsn'], $configDb['user'], $configDb['password'], $options);
    }

    public function getPDO() : PDO
    {
        return $this->pdo;
    }
}