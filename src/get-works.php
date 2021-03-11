<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();

$work = new Work($pdo);

//Запрос на выборку всех статей о выполненных работах и по одному фото для каждой статьи
$queryString = 'SELECT `id`,`heading`,`description`,`page_name`,`number_views`,`create_date`,
                (SELECT `photo_name` FROM `photo_works` `pw` WHERE `cw`.`id`=`pw`.`work_id` LIMIT 1) 
                AS `photo_name` FROM `completed_works` `cw`';

$works = $work->getAllWorks($queryString);

$mainHeading = false;

$html = '<main>
            <div class="pipe-vertical-left"></div>
            <div class="pipe-vertical-right"></div>
            <section>';

//Собирает html с короткими статьями о работах для страницы Выполненные работы
foreach($works as $work){
    $html .= "<div class='container-section' id='{$work['id']}'>
                 <div class='container-center'>";

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
                        <hr style='margin-bottom: 30px'>
                        <a class='detail' href='vypolnennye-raboty/{$work['page_name']}'>Подробнее</a>
                    </article>
                 </div>
              </div>";
}

$html .= '</section></main>';

echo $html;