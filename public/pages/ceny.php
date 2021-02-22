<?php

require_once '../include/header.php';
$monthName = require_once '../../src/get-month-name.php';

?>

<main>
    <section>
        <div class="container-center">
            <hr>
            <h2>Цены на <?= date("d ${monthName} Y") ?> года</h2>
            <hr>
            <table>
                <thead>
                <tr>
                    <th>Вид работы</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Прокол грунта &#8960 25</td>
                    <td>1 метр погонный</td>
                    <td>350</td>
                </tr>
                <tr>
                    <td>Прокол грунта &#8960 32</td>
                    <td>1 метр погонный</td>
                    <td>350</td>
                </tr>
                <tr>
                    <td>Прокол грунта &#8960 40</td>
                    <td>1 метр погонный</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Прокол грунта &#8960 50</td>
                    <td>1 метр погонный</td>
                    <td>450</td>
                </tr>
                <tr>
                    <td>Прокол грунта &#8960 63</td>
                    <td>1 метр погонный</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Прокладка канализации &#8960 110</td>
                    <td>1 метр погонный</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>Врезка в водопроводную трубу под давлением &#8960 100</td>
                    <td>1</td>
                    <td>2500</td>
                </tr>
                <tr>
                    <td>Врезка в водопроводную трубу под давлением &#8960 150</td>
                    <td>1</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>Врезка в водопроводную трубу под давлением &#8960 200</td>
                    <td>1</td>
                    <td>3500</td>
                </tr>
                <tr>
                    <td>Замена крана под давлением</td>
                    <td>1</td>
                    <td>1000-2000</td>
                </tr>
                <tr>
                    <td>Замена задвижек</td>
                    <td>1</td>
                    <td>от 4000</td>
                </tr>
                <tr>
                    <td>Постройка колодца</td>
                    <td>1</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>Прокладка водопроводных труб по траншее (с нашей раскопкой)</td>
                    <td>1 метр погонный</td>
                    <td>450</td>
                </tr>
                <tr>
                    <td style="border-bottom-left-radius: 15px">
                        Прокладка водопроводных труб по траншее (с вашей раскопкой)
                    </td>
                    <td>1 метр погонный</td>
                    <td style="border-bottom-right-radius: 15px">150-200</td>
                </tr>
                </tbody>
            </table>
            <div class="contacts">
                <hr>
                <h2>Звоните чтобы узнать более точную информацию</h2>
                <hr>
                <address>г. Днепр и область</address>
                <div>
                    <img src="public/images/telecom-operators/lifecell.png" alt="Лайф" title="Лайф">
                    <a href="tel:+380636364260">063 636 4260</a>
                </div>
                <div>
                    <img src="public/images/telecom-operators/kievstar.png" alt="Киевстар" title="Киевстар">
                    <a href="tel:+380636364260">067 504 4292</a>
                </div>
                <div>
                    <img src="public/images/telecom-operators/vodafone.png" alt="Водафон" title="Водафон">
                    <a href="tel:+380636364260">050 684 4905</a>
                </div>
                <hr>
                <h2>Или вы можете написать нам</h2>
                <hr>
            </div>
            <div class="messengers" style="margin-top: 10px">
                <div class="messenger">
                    <img src="public/images/messengers/viber.png" alt="Viber" title="Viber">
                    <a href="viber://chat?number=380636364260">Написать в Viber</a>
                </div>
                <div class="messenger">
                    <img src="public/images/messengers/telegram.png" alt="Telegram" title="Telegram">
                    <a href="tg://resolve?domain=kharchenko_nikolay">Написать в Telegram</a>
                </div>
                <div class="messenger">
                    <img src="public/images/messengers/whatsapp.png" alt="Whatsapp" title="Whatsapp">
                    <a href="https://wa.me/380636364260">Написать в Whatsapp</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '../include/footer.php'; ?>

</body>
</html>