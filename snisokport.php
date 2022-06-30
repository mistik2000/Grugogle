<?php 
require("./db1.php"); 
session_start();
?> 

<?php // выход 
 if(isset($_GET['exit'])) 
 { 
 session_destroy(); 
 header('Location: ./glavnai.php'); 
 exit; 
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="./css/spisok.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/menu.js" defer></script>
</head>
<body>
    <header class="header">
        <button class="header__menu-burger">
        <nav class="header__list">
            <li class="header__item"><a href="./okompanii.php" class="header__link">О компании</a></li>
            <li class="header__item"><a href="./kontakti.php" class="header__link">Контакты</a></li>
            <li class="header__item"><a href="./vopros.php" class="header__link">Вопрос и ответы</a></li>
            <li class="header__item"><a href="./snisokport.php" class="header__link">Список партнеров</a></li>
            <li class="header__item"><a href="./tarif.php" class="header__link">Тарифы для юр лиц</a></li>
        </nav>
        </button>
        <a href="#" class="header__logo"><img src="./img/Grugogle.png" alt="logo"></a>
        <?php if(isset($_SESSION['auth'])): ?> 
            <a href="?exit" class="header_input"><img  src="./img/vihod.png" alt=""></a> 
            <a href="./kobinet.php" class="header__personal__area"><img src="./img/lic.png" alt=""></a>
        <?php else: ?> 
            <a href="./vhod.php" class="header_input"><img src="./img/vhod.png" alt="vhod"></a>
        <?php endif; ?>
    </header> 
    <article>
        <p>Наши партнеры</p>
        <div class="str1">
            <a href="https://moskva.mts.ru/personal"><img class="mtc" src="./img/mtc.png" alt="mtc"></a>
            <a href="https://5ka.ru/"><img class="piter" src="./img/piter.png" alt="piter"></a>
            <a href="https://www.rzd.ru/"><img class="rgd" src="./img/rgd.png" alt="rgd"></a>
        </div>
        <div class="str2">
            <a href="https://lukoil.ru/"><img class="lukoil" src="./img/lukoil.png" alt="lukoil"></a>
            <a href="https://neftm.ru/"><img class="neft" src="./img/neft.png" alt="neft"></a>
            <a href="#"><img class="stroi" src="./img/stroi.png" alt="stroi"></a>
        </div>
        <div class="str3">
            <a href="https://yandex.ru/"><img class="yandex" src="./img/yandex.png" alt="yandex"></a>
            <a href="https://msk.obukhov.ru/"><img class="volvo" src="./img/volvo.png" alt="volvo"></a>
            <a href="https://www.wildberries.ru/"><img class="vb" src="./img/vb.png" alt="vb"></a>
        </div>
        <div class="str4">
            <a href="https://rutube.ru/"><img class="rutube" src="./img/rutube.png" alt="rutube"></a>
            <a href="https://moscow-beeline.ru/tarifi/mobilnaya_svaz"><img class="beeline" src="./img/beeline.png" alt="beeline"></a>
            <a href="https://www.tinkoff.ru/"><img class="tinek" src="./img/tinek.png" alt="tinek"></a>
        </div>
        <div class="str5">
            <a href="https://www.lada.ru/?%02&"><img class="vaz" src="./img/vaz.png" alt="vaz"></a>
            <a href="https://www.perekrestok.ru/"><img class="perek" src="./img/perek.png" alt="perek"></a>
            <a href="https://www.mercedes-benz.ru/passengercars.html"><img class="merc" src="./img/merc.png" alt="merc"></a>
        </div>
        <div class="str6">
            <a href="https://www.gazprom-neft.ru/"><img class="gaz" src="./img/gaz.png" alt="gaz"></a>
            <a href="https://www.ozon.ru/"><img class="ozon" src="./img/ozon.png" alt="ozon"></a>
            <a href="https://www.samsung.com/ru/"><img class="samsung" src="./img/samsung.png" alt="samsung"></a>
        </div>
    </article> 
    <footer>
        <div class="footer">
             <ul class="footer__list">
                <li class="footer__item"><a href="./okompanii.php" class="menupodval">О компании</a></li>
                <li class="footer__item"><a href="./kontakti.php" class="menupodval">Контакты</a></li>
                <li class="footer__item"><a href="./vopros.php" class="menupodval">Вопросы и ответы</a></li>
                <li class="footer__item"><a href="./snisokport.php" class="menupodval">Список партнеров</a></li>
                <li class="footer__item"><a href="./tarif.php" class="menupodval">Трифа для юр. лиц</a></li>
            </ul>
            <a href="./glavnai.php"><img class="logo" src="./img/Grugogle.png" alt="vhod"></a>
            <ul class="svi">
                <li class="footer__item"><a>grugogle@gmail.com</a></li>
                <li class="footer__item"><a>89258674986</a></li>
            </ul>
        </div>
    </footer> 
</body>
</html>
    