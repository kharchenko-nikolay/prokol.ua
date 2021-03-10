<?php

class Work
{
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

    //Возвращает массив с данными об одной работе из базы данных
    public function getWork(string $pageName) : array
    {
        $scriptName = baseName($pageName);

        $queryString = "SELECT `id`,`heading`,`description`,`number_views`,`create_date`
                        FROM `completed_works` WHERE `page_name` = '$pageName'";

        $work = $this->pdo->query($queryString)->fetch();

        $queryString = "SELECT `photo_name` FROM `photo_works` WHERE `work_id` = {$work['id']}";
        $photos = $this->pdo->query($queryString)->fetchAll();

        $work += ['photos' => $photos];

        return $work;
    }
}