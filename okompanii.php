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
    <link rel="stylesheet" href="./css/okompanii.css">
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
        <div class="bl">
            <div>
                <p class="zagolovok">Сервис для поиска работы и сотрудников</p>
                <div class="blok">
                    <div class="blk">
                        <div>
                            <p class="text">20 тысяч</p>
                            <p class="text2">резюме</p>
                        </div>
                        <img class="line" src="./img/Line.svg" alt="line">
                        <div>
                            <p class="text3">10 тысяч</p>
                            <p class="text4">работодателей</p>
                        </div>
                    </div>
                </div>
            </div>
            <img class="foto" src="./img/foto.png" alt="foto">
        </div>
        <p class="text5">Кому полезен</p>
        <p class="text6">Grugogle - сервис для поиска работы на московском рынке. Компания быстро растет и развивается, чтобы стать лидером московсего hr-tech рынка.</p>
        <div class="blok1">
        <div class="fonrab">
            <img class="rab" src="./img/rab.png" alt="rab">
            <p class="text7">Для работодателя</p>
            <p class="text8">Сервис Grugogle необходимо для помощи работодателю эффективно искать сотрудников.</p>
        </div>
        <div class="fonsois">
            <img class="soisk" src="./img/soisk.png" alt="soisk">
            <p class="text9">Для соискателя</p>
            <p class="text10">Мы даем возможность найти работу каждому по душе.</p>
        </div>
        </div>
        <p class="text11">Наша команда</p>
        <p class="text12">В сервесе Grugogle уже более 200 сотрудников. Офисы компании открыты в Москве.</p>
        <div class="blok2">
            <div>
                <img class="ryz" src="./img/ryz.png" alt="ryz">
                <p class="text13">Мария Рузвельд</p>
            </div>
            <div class="m">
                <img class="mish" src="./img/mish.png" alt="mish">
                <p class="text14">Константин Мишин</p>
            </div>
            <div class="v">
                <img class="vas" src="./img/vas.png" alt="vas">
                <p class="text15">Наталья Васницова</p>
            </div>
            <div class="g">
                <img class="gai" src="./img/gai.png" alt="gai">
                <p class="text16">Татьяна Гайдар</p>
            </div>
        </div>
      
        
        <p class="text17">Наш офис</p>
        <div class="blok3">
            <img class="foto2" src="./img/foto2.png" alt="foto2">
            <p class="text18">В нашем офисе комфортные условия для работы. Новейшая техника и оборудование.</p>
            <img class="foto3" src="./img/foto3.png" alt="foto3">
        </div>
        <div class="blok4">
            <p class="text19">Собственный подход к каждому работнику.</p>
            <img class="foto4" src="./img/foto4.png" alt="foto4">
            <p class="text20">Так же отдельный подход к каждому клиенту</p>
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