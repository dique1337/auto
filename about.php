<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>О нас | Автосервис</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">Автосервис</div>
    <nav>
        <a href="index.php">Главная</a>
        <a href="services.php">Услуги</a>
        <a href="contacts.php">Контакты</a>
        <a href="about.php">О нас</a>
    </nav>
    <div class="user">
        <?= $username ?> |
        <a href="logout.php"><button class="logout">Выйти</button></a>
    </div>
</header>

<main>
    <h1>О нас</h1>
    <p>Наш автосервис работает более 10 лет, предоставляя качественные услуги по ремонту автомобилей любых марок.</p>
    <p>Мы используем современное оборудование и оригинальные запчасти, а наши мастера — настоящие профессионалы своего дела.</p>
</main>
</body>
</html>
