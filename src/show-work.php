<?php

require_once '../public/include/header-part-one.php';
require_once 'database/ConnectDb.php';
require_once 'database/Work.php';
$configDb = require_once 'database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();

$work = new Work($pdo);

$pageName = basename($_SERVER["REQUEST_URI"]);
$workData = $work->getWork($pageName);

?>

    <title>💧<?= $workData['heading']?> в Днепре💧</title>
    <meta name="description"
          content="Монтаж водопровода. Прокол под дорогой.
          Врезка в водопровод. Бесплатный выезд мастера. <?= $workData['heading'] ?>">
    <meta name="keywords" content="монтаж водопровода, монтаж канализации, прокол под дорогой, врезка в водопровод">

<?php require_once '../public/include/header-part-two.php'; ?>

<main>
    <div class="pipe-vertical-left"></div>
    <div class="pipe-vertical-right"></div>
    <section>
        <div class="container-section">
            <div class="container-center">
                <hr>
                <h2 class="main-heading"><?= $workData['heading'] ?></h2>
                <hr>
                <article class='container-article'>
                    <div class='article-info'>
                        <time datetime='<?= $workData['create_date'] ?>'>Дата: <?= $workData['create_date'] ?></time>
                        <span>Просмотры: <?= $workData['number_views'] ?></span>
                    </div>

                    <?php
                    //Вывод всех фотографий статьи
                    foreach ($workData['photos'] as $photo){

                        $imgTitle = stristr($photo['photo_name'], '.', true);

                        echo "<img src='/public/images/photo-works/{$photo['photo_name']}'
                                   alt='$imgTitle' title='$imgTitle' style='margin-bottom: 15px'>";
                    }
                    ?>

                    <p><?= $workData['description'] ?></p>
                    <hr style="margin-bottom: 30px">
                    <a class="detail" href="/vypolnennye-raboty/<?= $workData['id'] ?>">
                        Вернуться назад</a>
                </article>
            </div>
        </div>
    </section>
</main>

<?php

//Увеличиваю количество просмотров статьи на +1 просмотр, запись в базу данных
$work->incrementNumberViews((int)$workData['number_views']);
require_once '../public/include/footer.php';

?>

</body>
</html>


