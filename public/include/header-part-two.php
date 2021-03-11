    <link rel="icon" href="/public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/style.css" type="text/css">
</head>

<body>

<header>
    <img src="/public/images/header.jpg" alt="header">
    <img class="sun-img" src="/public/images/sun.png" alt="sun">

    <a class="logo-text" href="/">
        <h1>Прокол под дорогой<br>Монтаж водопровода</h1>
    </a>

    <div class="messengers-header">
        <a href="https://wa.me/380636364260">
            <img src="/public/images/messengers/whatsapp.png" alt="Whatsapp" title="Whatsapp">
        </a>
        <a href="tg://resolve?domain=kharchenko_nikolay">
            <img src="/public/images/messengers/telegram.png" alt="Telegram" title="Telegram">
        </a>
        <a href="viber://chat?number=380636364260">
            <img src="/public/images/messengers/viber.png" alt="Viber" title="Viber">
        </a>
    </div>

    <div class="phones">
        <address style="color: #3b3b3b;">г. Днепр</address>
        <div class="phone" style="margin-top: 5px;">
            <img src="/public/images/telecom-operators/lifecell.png" alt="Лайф" title="Лайф">
            <a href="tel:+380636364260" title="life">063 636 42 60</a>
        </div>
        <div class="phone">
            <img src="/public/images/telecom-operators/kievstar.png" alt="Киевстар" title="Киевстар">
            <a href="tel:+380636364260" title="kievstar">097 457 61 20</a>
        </div>
        <div class="phone">
            <img src="/public/images/telecom-operators/vodafone.png" alt="Водафон" title="Водафон">
            <a href="tel:+380636364260" title="vodafone">050 238 71 22</a>
        </div>
        <button class="btn-call-order">Заказать звонок</button>
    </div>

    <nav class="main-menu">
        <ul class="menu">
            <li class="menu-item <?php if($_SERVER['REQUEST_URI'] == '/') echo 'active'; ?>">
                <a href="/">Главная</a>
            </li>
            <li class="menu-item <?php if($_SERVER['REQUEST_URI'] == '/vidy-rabot') echo 'active'; ?>">
                <a href="/vidy-rabot">Виды работ</a>
            </li>
            <li class="menu-item
            <?php if(preg_match('/vypolnennye-raboty/', $_SERVER['REQUEST_URI'])) echo 'active'; ?>">
                <a href="/vypolnennye-raboty">Выполненные работы</a>
            </li>
            <li class="menu-item <?php if($_SERVER['REQUEST_URI'] == '/kontakty') echo 'active'; ?>">
                <a href="/kontakty">Контакты</a>
            </li>
            <li class="menu-item <?php if($_SERVER['REQUEST_URI'] == '/ceny') echo 'active'; ?>">
                <a href="/ceny">Цены</a>
            </li>
        </ul>
    </nav>
</header>
