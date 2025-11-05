<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Добавить автомобиль</title>
<link rel="stylesheet" href="style.css">
<style>
form {
    max-width: 500px;
    margin: 120px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 25px rgba(255, 255, 255, 0.1);
}
input, textarea, button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 6px;
    border: none;
    font-family: 'Segoe UI', sans-serif;
}
input, textarea {
    background: #2a2a2a;
    color: #fff;
}
button {
    background: #fff;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    background: #e0e0e0;
}
</style>
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
        <?= htmlspecialchars($_SESSION['username']) ?> |
        <a href="logout.php"><button class="logout">Выйти</button></a>
    </div>
</header>

<form method="post" action="add_car_action.php">
    <h2>Добавить автомобиль</h2>
    <input type="text" name="name" placeholder="Название автомобиля" required>
    <textarea name="description" placeholder="Описание" required></textarea>
    <input type="url" name="image_url" placeholder="Ссылка на изображение (https://...)" required>
    <button type="submit">Добавить</button>
</form>

</body>
</html>
