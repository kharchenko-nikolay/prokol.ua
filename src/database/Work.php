<?php

class Work
{
    private $pdo;
    private $workId;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //Возвращает массив работ, выборку из базы данных по запросу queryString
    public function getAllWorks(string $sqlCondition) : array
    {
        $queryString = 'SELECT `id`,`heading`,`description`,`page_name`,`number_views`,`create_date`,
                        (SELECT `photo_name` FROM `photo_works` `pw` WHERE `cw`.`id`=`pw`.`work_id` LIMIT 1) 
                        AS `photo_name` FROM `completed_works` `cw` ';

        $queryString .= $sqlCondition;

        return $this->pdo->query($queryString)->fetchAll();
    }

    //Возвращает массив с данными об одной работе из базы данных
    public function getWork(string $pageName) : array
    {
        $scriptName = baseName($pageName);

        $queryString = "SELECT `id`,`heading`,`description`,`number_views`,`create_date`
                        FROM `completed_works` WHERE `page_name` = '$pageName'";

        $work = $this->pdo->query($queryString)->fetch();

        $this->workId = $work['id'];

        $photos = $this->getPhotos();
        $work += ['photos' => $photos];

        return $work;
    }

    //Возвращает массив фотографий по id работы
    private function getPhotos() : array
    {
        $queryString = "SELECT `photo_name` FROM `photo_works` WHERE `work_id` = {$this->workId}";
        $photos = $this->pdo->query($queryString)->fetchAll();

        return $photos;
    }

    //Добавляет в базу данных +1 просмотр
    public function incrementNumberViews(int $numberViews) : void
    {
        ++$numberViews;

        $queryString = "UPDATE `completed_works` SET `number_views` = ? WHERE `id` = $this->workId";
        $stmt = $this->pdo->prepare($queryString);

        $stmt->bindValue(1, $numberViews, PDO::PARAM_INT);
        $stmt->execute();
    }
}