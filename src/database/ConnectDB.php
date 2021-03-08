<?php

class ConnectDB
{
    private $dsn;
    private $pdo;
    private $options;

    public function __construct(array $configDb)
    {
        $this->dsn = "mysql:host={$configDb['host']};dbname={$configDb['database']}";

        $this->options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->pdo = new PDO($this->dsn, $configDb['user'], $configDb['password'], $this->options);
    }

    //Возвращает PhpDataObject соединение с базой данных
    public function getPDO() : PDO
    {
        return $this->pdo;
    }
}