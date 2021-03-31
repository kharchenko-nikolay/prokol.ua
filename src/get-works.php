<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();
$work = new Work($pdo);

$articleId = basename($_SERVER['REQUEST_URI']);
$articlesLimit = 5;

/* Если в адресной строке есть id статьи с которой пользователь вернулся по кнопке (вернутся назад)
то вычисляю по этому id какой сейчас номер страницы, каждые 5 статей в разделе выполненные работы
считается как одна страница, тоесть если на странице например 15 статей то это уже 3 страницы */
if (is_numeric($articleId)){

    if ($articleId % $articlesLimit === 0){
        $pageNumber = (int)($articleId / $articlesLimit);
    } else{
        $pageNumber = (int)($articleId / $articlesLimit + 1);
    }

    $articlesCount = $pageNumber * $articlesLimit;
    $sqlCondition = "LIMIT $articlesCount";

} else{
    //Запрос на выборку первых 5 статей о выполненных работах и по одному фото для каждой статьи
    $sqlCondition = "LIMIT $articlesLimit";
}

$works = $work->getAllWorks($sqlCondition);
$mainHeading = false;

$html = '<main>
            <div class="pipe-vertical-left"></div>
            <div class="pipe-vertical-right"></div>
            <section><div class="articles">';

//Собирает html с короткими статьями о работах для страницы Выполненные работы
foreach($works as $work){
    $html .= "<div class='container-section' id='{$work['id']}'>
                 <div class='container-center'>";

    if($mainHeading === false){
        $html .= '<hr><h2 class="main-heading">Выполненные работы</h2><hr>';
        $mainHeading = true;
    }

    $imgTitle = stristr($work['photo_name'], '.', true);
    $shortDescription = mb_substr($work['description'], 0, 170);

    $html .= "<article class='container-article'>
                  <div class='article-info'>
                      <time datetime='{$work['create_date']}'>Дата: {$work['create_date']}</time>
                      <span>Просмотры: {$work['number_views']}</span>
                  </div>
                  <img src='/public/images/photo-works/{$work['photo_name']}'
                       alt='$imgTitle' title='$imgTitle'>
                  <h3>{$work['heading']}</h3>
                  <p>$shortDescription ...</p>
                  <hr style='margin-bottom: 30px'>
                  <a class='detail' href='/vypolnennye-raboty/{$work['page_name']}'>Подробнее</a>
              </article>
              </div>
              </div>";
}

$html .= '</div><div class="container-center">
             <button class="more-works">Показать больше работ</button>
             <span class="no-works-message">Извините на данный момент больше нет работ!</span>
          </div></section></main>';

echo $html;