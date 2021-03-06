<?php

$config = require_once 'database/configDb.php';

$dsn = "mysql:host={$config['host']};dbname={$config['database']}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $config['user'], $config['password'], $options);

$stmt = $pdo->query('SELECT * FROM `completed_works`');

var_dump($stmt->fetchAll());

exit;

$arr = [1,2,3,4,5];
$heading = false;

$html = '<main>
            <div class="pipe-vertical-left"></div>
            <div class="pipe-vertical-right"></div>
            <section>';

foreach($arr as $i){
    $html .= '<div class="container-section">
                 <div class="container-center">';

    if(!$heading){
        $html .= '<hr><h2 class="main-heading">Выполненные работы</h2><hr>';
        $heading = true;
    }

    $html .= '<article class="container-article">
                        <img src="public/images/photo-works/vodoprovod-v-dome.jpg"
                             alt="Водопровод в доме" title="Водопровод в доме">
                        <h3>Заменили трубы в частном секторе на новые пластиковые</h3>
                        <p>Поменяли старый водопровод на новую трубу пнд диаметром 32 длинной 27 метров</p>
                        <a class="detail" href="/">Подробнее</a>
                        <hr>
                    </article>
                 </div>
              </div>';

}

$html .= '</section></main>';

echo $html;