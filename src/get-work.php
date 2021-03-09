<?php

require_once 'database/ConnectDb.php';
require_once 'database/Works.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();

$works = new Works($pdo);
//
//Запрос на выборку из одной таблицы данных о статье и из второй таблицы одно фото для этой статьи
$queryString = 'SELECT `heading`,`description`,`page_file_name`,`number_views`,`create_date`,
                (SELECT `photo_name` FROM `photo_works` `pw` WHERE `cw`.`id`=`pw`.`work_id` LIMIT 1) 
                AS `photo_name` FROM `completed_works` `cw`';

$works = $works->getAllWorks($queryString);

$mainHeading = false;

$html = '<main>
            <div class="pipe-vertical-left"></div>
            <div class="pipe-vertical-right"></div>
            <section>';

//Собирает html с короткими статьями о работах для страницы Выполненные работы
foreach($works as $work){
    $html .= '<div class="container-section">
                 <div class="container-center">';

    if($mainHeading === false){
        $html .= '<hr><h2 class="main-heading">Выполненные работы</h2><hr>';
        $mainHeading = true;
    }

    $imgTitle = stristr($work['photo_name'], '.', true);

    $html .= "<article class='container-article'>
                        <div class='article-info'>
                            <time datetime='{$work['create_date']}'>Дата создания: {$work['create_date']}</time>
                            <span>Количество просмотров: {$work['number_views']}</span>
                        </div>
                        <img src='public/images/types-works/{$work['photo_name']}'
                             alt='$imgTitle' title='$imgTitle'>
                        <h3>{$work['heading']}</h3>
                        <p>{$work['description']}</p>
                        <a class='detail' href='{$work['page_file_name']}'>Подробнее</a>
                        <hr>
                    </article>
                 </div>
              </div>";
}

$html .= '</section></main>';

echo $html;