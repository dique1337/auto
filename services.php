<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = htmlspecialchars($_SESSION['username']);
?>
<<<<<<< HEAD
=======

>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
<title>Услуги | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #111;
    color: #fff;
}

/* --- фиксированный хедер --- */
header {
    background: #1a1a1a;
    padding: 18px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 100;
    box-shadow: 0 2px 10px rgba(255,255,255,0.05);
}

.logo {
    font-size: 22px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
}

nav {
    display: flex;
    align-items: center;
    gap: 25px;
}

nav a {
    color: #ccc;
    text-decoration: none;
    font-size: 15px;
    transition: 0.3s;
    padding-bottom: 2px;
}

nav a:hover,
nav a.active {
    color: #fff;
    border-bottom: 2px solid #fff;
}

.user {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #ccc;
    font-size: 14px;
}

.logout {
    background: #fff;
    color: #000;
    border: none;
    padding: 7px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.logout:hover {
    background: #e0e0e0;
}

/* --- контент --- */
main {
    padding: 120px 20px 60px;
    text-align: center;
}

h1 {
    font-size: 32px;
    margin-bottom: 10px;
    font-weight: 400;
}

p.subtitle {
    color: #aaa;
    margin-bottom: 50px;
    font-size: 16px;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1100px;
    margin: 0 auto;
}

.service-card {
    background: #1a1a1a;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 0 10px rgba(255,255,255,0.05);
    transition: 0.3s;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 20px rgba(255,255,255,0.1);
}

.service-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
}

.service-card h3 {
    color: #fff;
    font-weight: 500;
    margin-bottom: 10px;
}

.service-card p {
    color: #bbb;
    font-size: 14px;
    line-height: 1.6;
}
</style>
</head>
<body>
<header>
    <div class="logo">Автосервис</div>
    <nav>
        <a href="index.php">Главная</a>
        <a href="services.php" class="active">Услуги</a>
        <a href="contacts.php">Контакты</a>
        <a href="about.php">О нас</a>
    </nav>
    <div class="user">
        <?= $username ?>
        <a href="logout.php"><button class="logout">Выйти</button></a>
    </div>
</header>

<main>
    <h1>Наши услуги</h1>
    <p class="subtitle">Профессиональный уход за вашим автомобилем — быстро, качественно и надёжно.</p>

    <div class="services-grid">
        <div class="service-card">
            <img src="https://images.satu.kz/176230765_w640_h2048_36f68bf941011.jpg?fresh=1&PIMAGE_ID=176230765" alt="Диагностика">
            <h3>Компьютерная диагностика</h3>
            <p>Современное оборудование позволяет точно определить неисправности и предотвратить серьёзные поломки.</p>
        </div>

        <div class="service-card">
            <img src="https://filtronik.ru/image/catalog/BLOG/zamenafiltra(2).jpg" alt="Замена масла">
            <h3>Замена масла и фильтров</h3>
            <p>Используем только качественные масла и фильтры. Работаем быстро и с гарантией.</p>
        </div>

        <div class="service-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXyU__sE_57yuXaKi8N9F2R5KyzrI1S42kHFMbOHO-KqMm00gFVCVmV1chZEVxEPnZOmw&usqp=CAU" alt="Ремонт двигателя">
            <h3>Ремонт двигателя</h3>
            <p>Квалифицированные специалисты выполняют ремонт любой сложности с использованием оригинальных запчастей.</p>
        </div>

        <div class="service-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRz3kCPaxRpDrUE_DlImXnC4cLnUQPdp2tMzQ&s" alt="Шиномонтаж">
            <h3>Шиномонтаж и балансировка</h3>
            <p>Обеспечьте безопасность на дороге — профессиональная балансировка и быстрая замена шин.</p>
        </div>

        <div class="service-card">
            <img src="https://japzap.ru/upload/iblock/c27/c27176c50adf18a0a8c01d4d5ac5434d.jpg" alt="Ремонт подвески">
            <h3>Ремонт подвески</h3>
            <p>Восстановим комфорт и управляемость вашего автомобиля. Диагностика и ремонт любой сложности.</p>
        </div>

        <div class="service-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQefakKaSGKAdeA-jO2qTTK2nmd5i2uWoBcXg&s" alt="Электрика">
            <h3>Автоэлектрика</h3>
            <p>Ремонт и диагностика электрооборудования — от генераторов до сложных систем управления.</p>
        </div>
    </div>
</main>
=======
<title>Главная | Автосервис</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h1>Добро пожаловать, <?= $username ?>!</h1>
    <p>Мы рады видеть вас в нашем автосервисе. Выберите услугу или закажите прямо сейчас:</p>

    <div class="two-columns">
        <!-- Левая колонка: список услуг -->
        <div class="services-list">
            <h2>Наши услуги</h2>
            <ul>
                <li>Диагностика и ремонт двигателя</li>
                <li>Замена масла и фильтров</li>
                <li>Шиномонтаж и балансировка</li>
                <li>Ремонт подвески</li>
                <li>Компьютерная диагностика</li>
                <li>Техническое обслуживание</li>
            </ul>
        </div>

        <!-- Правая колонка: форма заказа -->
        <div class="order-form">
            <h2>Заказать услугу</h2>
            <form action="order.php" method="post">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="email" name="email" placeholder="Ваш Email" required>
                <textarea name="service" placeholder="Какая услуга вас интересует?" required></textarea>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>

>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
</body>
</html>
