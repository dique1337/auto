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
<<<<<<< HEAD
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
=======
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>О нас | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
/* Блоки о нас */
.about-section {
    max-width: 1000px;
    margin: 50px auto;
    display: flex;
    flex-direction: column;
    gap: 40px;
    text-align: left;
}

.about-card {
    background: #1a1a1a;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
    transition: 0.3s ease;
}

.about-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 25px rgba(255,255,255,0.15);
}

.about-card h2 {
    color: #fff;
    margin-bottom: 15px;
}

.about-card p {
    color: #ccc;
    line-height: 1.6;
}

/* Адаптив */
@media (max-width: 768px) {
    .about-section {
        padding: 0 20px;
    }
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h1>О нас</h1>

    <div class="about-section">
        <div class="about-card">
            <h2>Наша миссия</h2>
            <p>Мы стремимся предоставлять качественные и надежные услуги для всех владельцев автомобилей, обеспечивая безопасность и комфорт на дороге.</p>
        </div>

        <div class="about-card">
            <h2>Наши преимущества</h2>
            <p>Опытные мастера, современное оборудование, оригинальные запчасти и индивидуальный подход к каждому клиенту позволяют нам гарантировать высокий уровень сервиса.</p>
        </div>

        <div class="about-card">
            <h2>Наша история</h2>
            <p>С 2013 года мы помогаем клиентам из Алматы и ближайших городов. За годы работы мы обслужили тысячи автомобилей и заслужили доверие сотен постоянных клиентов.</p>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>

>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
</body>
</html>
