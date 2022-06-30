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
    <link rel="stylesheet" href="./css/style.css">
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
        <form class="ser" name="f1" method="post" action="#">
            <input type="search" name="search_q" placeholder="Поиск вакансии">
            <button name="po" class="poisk" type="submit"><img src="./img/poisk.png" alt=""></button>
        </form>
        <form class="vak" action="./newvakansi.php">
        <button class="vak" type="submit">Добавить вакансию</button>
        </form>
        
        <?php
        $error = ''; 
        // Проверяем нажата ли кнопка отправки формы 
        if (isset($_REQUEST['po'])) { 
        $search_q = $_POST['search_q'];
        $search_q = trim($search_q);
        $search_q = strip_tags($search_q);
        $q= mysqli_query($db, "SELECT Category,Description,Datetime,Salary FROM `Information_about_the_vacancy` WHERE Category LIKE '%$search_q%'");

        while ($row = mysqli_fetch_assoc($q)) {
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
            mysqli_free_result($q);
            mysqli_close($db);
            }
            ?>
        
        
        
        
        
        <?php 
        $result = mysqli_query($db, "SELECT*FROM `Information_about_the_vacancy`"); 
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