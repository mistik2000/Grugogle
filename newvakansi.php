<?php 
    require("./db1.php"); 
    session_start();
?> 

<?php // регистрация 
$error = ''; 
// Проверяем нажата ли кнопка отправки формы 
if (isset($_REQUEST['ost'])) { 

// Если ошибок нет, то происходит регистрация 
if (!$_REQUEST['vak']) {
    $error = 'Введите вакансию';
}

if (!$_REQUEST['zar']) {
    $error = 'Введите зарплату';
}

if (!$_REQUEST['op']) {
    $error = 'Введите описание';
}

if (!$error) { 
    $vak = $_REQUEST['vak']; 
    $zar = $_REQUEST['zar'];
    $op = $_REQUEST['op'];
    $user = $_SESSION['ID_Users'];


// Добавление пользователя 
mysqli_query($db, "INSERT INTO `Information_about_the_vacancy` (`Category`,  `Description`, `Salary`, `ID_Users`) VALUES ('" . $vak . "', '" . $op . "', '" . $zar . "','".$_SESSION['ID_Users']."')"); 

// Подтверждение что всё хорошо 
echo 'Вакансия добавлена'; 
} else { 
// Если ошибка есть, то выводим её 
echo $error; 
} 
} 
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
    <link rel="stylesheet" href="./css/newvakansi.css">
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
        <div id="vakansi" class="animate form">
            <p>Новая вакансия</p>
            <form  action="#" method="post" name="form_register">
                <h1 class="vh">Добавьте вакансию</h1>
                    <input name="vak" required="required" type="text" placeholder="Вакансия"/>
                    <input name="zar" required="required" type="text" placeholder="Зарплата" />
                    <input name="op" required="required" type="text" placeholder="Описание" />
                    <button name="ost" type="submit">Оставить вакансию</button>
            </form>
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