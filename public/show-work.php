<?php

require_once 'include/header-part-one.php';
require_once '../src/database/ConnectDb.php';
require_once '../src/database/Work.php';
$configDb = require_once '../src/database/configDb.php';

$connectDb = new ConnectDb($configDb);
$pdo = $connectDb->getPDO();

$work = new Work($pdo);

$pageName = basename($_SERVER["REQUEST_URI"]);
$workData = $work->getWork($pageName);

$work->incrementNumberViews((int)$workData['number_views']);

?>

    <title><?= $workData['heading'] ?></title>
    <meta name="description" content="Монтаж водопровода. Прокол под дорогой. <?= $workData['heading'] ?>">
    <meta name="keywords" content="монтаж водопровода, монтаж канализации, прокол под дорогой, врезка в водопровод">

<?php require_once 'include/header-part-two.php'; ?>

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

                        echo "<img src='/public/images/types-works/{$photo['photo_name']}'
                                   alt='$imgTitle' title='$imgTitle' style='margin-bottom: 15px'>";
                    }
                    ?>

                    <p><?= $workData['description'] ?></p>
                    <hr style="margin-bottom: 30px">
                    <a class="detail" href="/vypolnennye-raboty#<?= $workData['id'] ?>">Вернуться назад</a>
                </article>
            </div>
        </div>
    </section>
</main>

<?php require_once 'include/footer.php'; ?>

</body>
</html>


