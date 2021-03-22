<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();
$work = new Work($pdo);

$pageNumber = $_GET['page'];
$articleLimit = 5;
$offset = $pageNumber * $articleLimit;

$sqlCondition = "LIMIT 5 OFFSET $offset";
$works = $work->getAllWorks($sqlCondition);

if(!empty($works)){

    $html = '';

    foreach($works as $work){

        $html .= "<div class='container-section' id='{$work['id']}'>
                 <div class='container-center'>";

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

    echo json_encode($html);
} else{
    echo json_encode(null);
}

