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
    public function getWorks(string $sqlCondition) : array
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
        $queryString = "SELECT `id`,`heading`,`description`,`number_views`,`create_date`
                        FROM `completed_works` WHERE `page_name` = '$pageName'";

        $work = $this->pdo->query($queryString)->fetch();

        $this->workId = $work['id'];

        $photos = $this->getPhotos();
        $work += ['photos' => $photos];

        return $work;
    }

    //Добавляет одну работу в базу данных, в таблицу completed_works
    public function addWork(string $heading, string $description, string $pageName) : bool
    {
        $heading = strip_tags(htmlspecialchars($heading));
        $description = strip_tags(htmlspecialchars($description));
        $pageName = strip_tags(htmlspecialchars($pageName));
        $date = date('d-m-Y');

        $queryString = "INSERT INTO `completed_works` VALUES (null, ?, ?, ?, 0, ?)";
        $stmt = $this->pdo->prepare($queryString);

        $stmt->bindValue(1, $heading, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $pageName, PDO::PARAM_STR);
        $stmt->bindValue(4, $date, PDO::PARAM_STR);

        try {
            $this->pdo->beginTransaction();
            $stmt->execute();
        } catch (PDOException $ex){
            return false;
        }

        $this->workId = $this->pdo->lastInsertId();
        return true;
    }

    /* Загружает фотографии в папку images/photo-works и добавляет названия фотографий в базу данных для
    последней добавленной работы из таблицы completed_works */
    public function addPhotosToWork(array $photos) : bool
    {
        foreach ($photos['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK){
                $tmpName = $photos['tmp_name'][$key];
                $name = basename($photos['name'][$key]);

                move_uploaded_file($tmpName, "../public/images/photo-works/$name");

                $queryString = "INSERT INTO `photo_works` (`id`, `photo_name`, `work_id`) 
                                       VALUES (null, '$name', '{$this->workId}')";

                try {
                    $this->pdo->exec($queryString);
                } catch (PDOException $ex){
                    $this->pdo->rollBack();
                    return false;
                }
            }
        }
        $this->pdo->commit();
        return true;
    }

    //Возвращает массив фотографий по id работы
    private function getPhotos() : array
    {
        $queryString = "SELECT `photo_name` FROM `photo_works` WHERE `work_id` = '{$this->workId}'";
        $photos = $this->pdo->query($queryString)->fetchAll();

        return $photos;
    }

    //Добавляет в базу данных +1 просмотр
    public function incrementNumberViews($numberViews) : void
    {
        ++$numberViews;

        $queryString = "UPDATE `completed_works` SET `number_views` = ? WHERE `id` = '{$this->workId}'";
        $stmt = $this->pdo->prepare($queryString);

        $stmt->bindValue(1, $numberViews, PDO::PARAM_INT);
        $stmt->execute();
    }
}