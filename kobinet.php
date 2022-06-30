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
    <link rel="stylesheet" href="./css/kobinet.css">
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
        <div class="form">
            <img src="./img/avatar.png" alt="">
            <?php
                $result = mysqli_query($db, "SELECT*FROM Users WHERE `ID_Users`='" . $_SESSION['ID_Users'] . "'");
                while( $row = mysqli_fetch_assoc($result) ){
            ?>
            <div class="viv">
                <p class="zag"><?php echo $row['FIO'] ?></p> 
                <p class="text">Email: <?php echo $row['Email'] ?></p> 
                <p class="text">Номер телефона: <?php echo $row['Number'] ?></p> 
                <p class="text"><?php echo $row['Status'] ?></p> 
                <a href="./newvakansi.php"><button class="vak" type="submit">Добавить вакансию</button></a>
                <a href="./tarif.php"><button class="vak" type="submit">Поменять тариф</button></a>
            </div>
            <?php
            }
            ?>
        </div>
        <h1>Активные вакансии</h1>
            <?php
                $result = mysqli_query($db, "SELECT*FROM Information_about_the_vacancy WHERE `ID_Users`='" . $_SESSION['ID_Users'] . "'");
                while( $row = mysqli_fetch_assoc($result) ){
            ?>

            <div class="vivod">
                <p class="cat"><?php echo $row['Category'] ?></p> 
                <p class="dat"><?php echo $row['Datetime'] ?></p> 
                <p class="sal"><?php echo $row['Salary'] ?>руб.</p> 
                <p class="des"><?php echo $row['Description'] ?></p> 
                <form class="otcl" action="#"></form>
                <button class="otkl" type="submit">Откликнуться</button>
                
                </form>
                


            </div>

            <?php
            }
            ?>
        <h1>Заданные вопросы</h1>
        <?php 
            $result = mysqli_query($db, "SELECT*FROM Questions WHERE `ID_Users`='" . $_SESSION['ID_Users'] . "'"); 
            while( $row = mysqli_fetch_assoc($result) ){ 
        ?> 
         
        <div class="cart">
            <p class="teg1">Тема: <?php echo $row['Team'] ?></p> 
            <p class="teg">Вопрос: <?php echo $row['Question'] ?></p> 
            <p class="teg2">Ответ: <?php echo $row['Other'] ?></p> 
        </div>

        <?php 
        } 
        ?>
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