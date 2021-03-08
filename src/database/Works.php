<?php


class Works
{
    private $stmt;
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //Возвращает массив работ, выборку из базы данных по запросу в параметре queryString
    public function getAllWorks(string $queryString) : array
    {
        return $this->pdo->query($queryString)->fetchAll();
    }
}