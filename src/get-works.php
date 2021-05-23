<?php

require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
require_once 'functions.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();
$work = new Work($pdo);

$articleId = basename($_SERVER['REQUEST_URI']);
$articlesLimit = 5;
$articlesCount = getArticlesCount($articleId, $articlesLimit);

$works = $work->getWorks("LIMIT $articlesCount");

$html = '<main>
            <div class="pipe-vertical-left"></div>
            <div class="pipe-vertical-right"></div>
            <section><div class="articles">';

$html .= collectsWorksInHtml($works, $html, false);

$html .= '</div><div class="container-center">
             <button class="more-works">Показать больше работ</button>
             <span class="no-works-message">Извините на данный момент больше нет работ!</span>
          </div></section></main>';

echo $html;