<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();

$work = new Work($pdo);

$queryString = 'SELECT `id`,`heading`,`description`,`page_name`,`number_views`,`create_date`,
                (SELECT `photo_name` FROM `photo_works` `pw` WHERE `cw`.`id`=`pw`.`work_id` LIMIT 1) 
                AS `photo_name` FROM `completed_works` `cw`';

$articleId = basename($_SERVER['REQUEST_URI']);
$articleLimit = 5;

if (is_numeric($articleId)){
    //Запрос на выборку всех статей <= пришедшего id статьи в $articleId, и по одному фото для каждой статьи
    $queryString .= ($articleId <= $articleLimit) ? " LIMIT $articleLimit" : " WHERE `cw`.`id` <= $articleId";
} else{
    //Запрос на выборку первых 5 статей о выполненных работах и по одному фото для каждой статьи
    $queryString .= " LIMIT $articleLimit";
}

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
                            <time datetime='{$work['create_date']}'>Дата: {$work['create_date']}</time>
                            <span>Просмотры: {$work['number_views']}</span>
                        </div>
                        <img src='/public/images/types-works/{$work['photo_name']}'
                             alt='$imgTitle' title='$imgTitle'>
                        <h3>{$work['heading']}</h3>
                        <p>{$work['description']}</p>
                        <hr style='margin-bottom: 30px'>
                        <a class='detail' href='/vypolnennye-raboty/{$work['page_name']}'>Подробнее</a>
                    </article>
                 </div>
              </div>";
}

$html .= '</section></main>';

echo $html;