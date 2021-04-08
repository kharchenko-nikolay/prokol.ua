<?php require_once 'public/include/header-part-one.php'; ?>

    <title>Прокол Под Дорогой в Днепре (Монтаж Водопровода)💧</title>
    <meta name="description" content="Прокол под дорогой. Монтаж водопровода и канализации.
    Врезка в трубу под давлением. Бесплатный выезд мастера. Звоните! ☎ (097) 972-81-76">
    <meta name="keywords" content="прокол под дорогой, укладка труб в траншею цена, врезка в водопровод,
    монтаж водопровода, канализация">

<?php require_once 'public/include/header-part-two.php'; ?>

<main>
    <div class="pipe-vertical-left"></div>
    <div class="pipe-vertical-right"></div>

    <section class="container-section">
        <div class="container-center">
            <hr>
            <h2 class="main-heading">Виды выполняемых работ</h2>
            <hr>
            <div class="flex-container">

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/prokol-pod-dorogoy.jpg"
                         alt="Прокол под дорогой, прокол под землей"
                         title="Прокол под дорогой для протяжки труб">
                    <div>
                        <a href="vidy-rabot#prokol">
                            <h3>Прокол под дорогой</h3>
                        </a>
                    </div>
                </div>

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/montag-vodoprovoda.jpg"
                         alt="Монтаж водопровода"
                         title="Монтаж водопровода">
                    <div>
                        <a href="vidy-rabot#vodoprovod">
                            <h3>Монтаж водопровода</h3>
                        </a>
                    </div>
                </div>

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/vodoprovod-v-chastnom-dome.jpg"
                         alt="Водопровод в частном доме и подвалах многоэтажек"
                         title="Замена старых труб на новые">
                    <div>
                        <a href="vidy-rabot#zamena-trub">
                            <h3>Водопровод в частном доме</h3>
                        </a>
                    </div>
                </div>

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/montazh-kanalizacii.jpg"
                         alt="Монтаж канализации"
                         title="Монтаж канализации">
                    <div>
                        <a href="vidy-rabot#kanalizaciya">
                            <h3>Монтаж канализации</h3>
                        </a>
                    </div>
                </div>

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/vrezka-v-vodoprovod.jpg"
                         alt="Врезка в водопровод"
                         title="Врезка в водопровод">
                    <div>
                        <a href="vidy-rabot#vrezka">
                            <h3>Врезка в трубу под давлением</h3>
                        </a>
                    </div>
                </div>

                <div class="wrapper-type-work">
                    <img src="public/images/types-works/sanaciya-truboprovoda.jpg"
                         alt="Санация трубопроводов, протяжка трубы в трубу"
                         title="Протяжка трубы в трубу">
                    <div>
                        <a href="vidy-rabot#sanaciya">
                            <h3>Санация, протяжка трубы в трубу</h3>
                        </a>
                    </div>
                </div>

            </div><!-- flex-container -->
            <a class="detail" href="vidy-rabot">Подробнее</a>
        </div><!-- container-center -->
    </section>

    <section class="container-section">
        <div class="container-center">
            <hr>
            <h2 class="main-heading">Наши преимущества</h2>
            <hr>
            <div class="flex-container">

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/quality.png" alt="Качество работ">
                    </div>
                    <p><b>Качество работ гарантируем</b><br>большой опыт</p>
                </div>
                <hr hidden>

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/terms.png" alt="Сроки выполнения">
                    </div>
                    <p><b>Сроки выполнения</b><br>работу выполняем максимально
                        быстро, обычно это 1 - 2 дня</p>
                </div>
                <hr hidden>

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/warranty.png" alt="Гарантия выполненной работы">
                    </div>
                    <p><b>Гарантия выполненной работы</b><br>
                        мы никуда не пропадаем, в случае утечки приезжаем делаем</p>
                </div>
                <hr hidden>

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/master.png" alt="Выезд мастера бесплатный">
                    </div>
                    <p><b>Выезд мастера бесплатный</b><br>мастер выезжает на осмотр объекта бесплатно</p>
                </div>
                <hr hidden>

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/delivery.png" alt="Доставка материала бесплатно">
                    </div>
                    <p><b>Доставка материала бесплатно</b><br>
                        материал к объекту доставляем на своем авто бесплатно</p>
                </div>
                <hr hidden>

                <div class="wrapper-advantage">
                    <div>
                        <img src="public/images/advantages/key.png" alt="Работа под ключ">
                    </div>
                    <p><b>Выполненяем работу под ключ</b><br>
                        прокладываем трубы, подключаемся, проверяем под давлением</p>
                </div>

            </div><!-- flex-container -->
        </div><!-- container-center -->
    </section>

    <section class="container-section">
        <div class="container-center">
            <hr>
            <h2 class="main-heading">Выполненные работы</h2>
            <hr>

            <div class="container-carousel">
                <div class="carousel-images">
                    <!-- Получение всех фотографий из папки с выполненными работами -->
                    <?php require_once 'src/get-photo-of-works.php'; ?>
                </div>

                <div class="arrows" style="margin-bottom: 5px">
                    <img src="public/images/arrow.png" class="arrow-left transition" alt="Стрелка влево">
                    <img src="public/images/points.png" class="points" alt="points">
                    <img src="public/images/arrow.png" class="arrow-right transition" alt="Стрелка вправо">
                </div>
            </div><!-- container-carousel -->

            <hr class="carousel-hr">
            <a class="detail" href="vypolnennye-raboty">Посмотреть больше работ</a>
        </div><!-- container-center -->
    </section>
</main>

<?php require_once 'public/include/footer.php'; ?>

<!--<script src="public/js/call-order-modal-window.js"></script>-->
<script src="public/js/carousel.js"></script>

</body>
</html>