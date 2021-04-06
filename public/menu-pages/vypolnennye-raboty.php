<?php require_once '../include/header-part-one.php'; ?>

    <title>Прокол Под Дорогой Днепр, Фото Выполненных Работ</title>
    <meta name="description" content="Выполняем монтаж водопровода и канализации,
    прокол под дорогой, врезка в водопровод под давлением. Звоните! ☎ (097) 972-81-76">
    <meta name="keywords" content="прокол под дорогой, прокладка труб, водопровод в частном доме,
    врезка в водопровод, монтаж водопровода, водопроводные работы, разводка труб">
    <meta property="og:image" content="https://prokol.net/public/images/logo.jpg">
    <meta property="og:title" content="Прокол под дорогой в Днепре. Монтаж водопровода и канализации.">

<?php

if(is_numeric(basename($_SERVER['REQUEST_URI'])))
    echo '<meta name="robots" content="noindex,nofollow">';

require_once '../include/header-part-two.php';
require_once '../../src/get-works.php';
require_once '../include/footer.php';

?>

<script src="/public/js/get-more-works.js"></script>

</body>
</html>
