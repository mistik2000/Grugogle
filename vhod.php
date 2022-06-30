<?php 
require("./db1.php"); 
?> 

<?php // регистрация 
$error = ''; 
// Проверяем нажата ли кнопка отправки формы 
if (isset($_REQUEST['su'])) { 

// Проверка на совпадение паролей 
if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) { 
$error = 'Пароль не совпадает'; 
} 

// Если ошибок нет, то происходит регистрация 
if (!$_REQUEST['email']) {
    $error = 'Введите Email';
}

if (!$_REQUEST['login']) {
    $error = 'Введите ФИО';
}

if (!$_REQUEST['tel']) {
    $error = 'Введите номер телефона';
}

if (!$_REQUEST['vib']) {
    $error = 'Введите категорию';
}

if (!$error) { 
    $email = $_REQUEST['email']; 
    $login = $_REQUEST['login'];
    $tel = $_REQUEST['tel'];
    $vib = $_REQUEST['vib'];

// Пароль хешируется 
$pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT); 

// Добавление пользователя 
mysqli_query($db, "INSERT INTO `Users` (`FIO`, `Email`, `Number`, `Status`, `Password`) VALUES ('" . $login . "','" . $email . "', '" . $tel . "', '" . $vib . "', '" . $pass . "')"); 

// Подтверждение что всё хорошо 
echo 'Регистрация прошла успешна'; 
} else { 
// Если ошибка есть, то выводим её 
echo $error; 
} 
} 
?> 

<?php // авторизация 
if (isset($_REQUEST['sub'])) { 

$log = $_REQUEST['log']; 
$pas = $_REQUEST['pas']; 

// берём из БД данные пользователя и записываем их в переменную, если введённый телефон совпал с телефоном из БД 
if ($result = mysqli_query($db, "SELECT*FROM `Users` WHERE `Email`='" . $log . "'")) { 
while( $row = mysqli_fetch_assoc($result) ){ 
// сравниваем пароли функцией password_verify 
if (password_verify($pas, $row['Password'])) { 
// Если функция возвращает true, то начинаем сессию 
header('Location: ./glavnai.php');
session_start(); 

//Пишем в сессию информацию о том, что мы авторизовались: 
$_SESSION['auth'] = true; 
$_SESSION['ID_Users'] = $row['ID_Users'];
} else { 
// Если функция возвращает false, то выводит ошибку 
echo "Неверный пароль"; 
} 
} 
} else { 
// Выводит ошибку если не нашли такой номер телефона 
echo "Неверный телефон"; 
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
    <link rel="stylesheet" href="./css/vhod.css">
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
    <div class="wrapper">
        <div id="login" class="animate form">
            
            <form  action="#" method="post" name="form_register">
                <h1 class="vh">Войти</h1>
                    <input class="input" name="log" required="required" type="text" placeholder="Логин (Email)"/>
                    <input class="input" name="pas" required="required" type="password" placeholder="Пароль" />
                    <button class="button" name="sub" type="submit">Войти</button>
            </form>
        </div>
        <div id="subscribe" class="ani">
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" name="form_register">
                <h1 class="zag">Зарегестрироваться</h1>
                    <input class="input" name="login" required="required" type="text" placeholder="ФИО" />
                    <input class="input" name="email" required="required" type="text" placeholder="Email"/>
                    <input class="input" name="tel" required="required" type="tel" placeholder="Номер телефона"/>
                    <input class="input" name="vib" required="required" type="text" placeholder="Работодатель/Соискатель"/>
                    <input class="input" name="pass" required="required" type="password" placeholder="Пароль"/>
                    <input class="input" name="pass_rep" required="required" type="password" placeholder="Повторите пароль"/>
                    <button class="button" name="su" type="submit">Зарегестрироваться</button>
            </form>
        </div>
    </div>

   
    </article>
    <footer>

    </footer>
    </body>
    </html>