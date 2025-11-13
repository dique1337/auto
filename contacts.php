<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты — Автосервис</title>
    <link rel="stylesheet" href="style.css">
=======
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Контакты | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
/* Контакты сотрудников */
.contacts {
    max-width: 1000px;
    margin: 50px auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.contact-card {
    background: #1a1a1a;
    padding: 25px;
    border-radius: 14px;
    text-align: center;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
    transition: 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 25px rgba(255, 255, 255, 0.15);
}

.contact-card h3 {
    color: #fff;
    margin-bottom: 5px;
}

.contact-card p {
    color: #ccc;
    font-size: 14px;
    margin-bottom: 8px;
}
</style>
>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
</head>
<body>

<?php include 'header.php'; ?>

<main>
<<<<<<< HEAD
    <h1>Свяжитесь с нами</h1>
    <p>📍 Адрес: г. Алматы, ул. Механиков 12</p>
    <p>📞 Телефон: +7 (777) 123-45-67</p>
    <p>📧 Email: autoservice@example.com</p>
    <p>⏰ Время работы: Пн–Сб с 9:00 до 20:00</p>
</main>
=======
    <h1>Наша команда</h1>
    <p>Познакомьтесь с нашими специалистами, которые заботятся о вашем автомобиле.</p>

    <div class="contacts">
        <div class="contact-card">
            <h3>Алексей Иванов</h3>
            <p>Главный механик</p>
            <p>📞 +7 (777) 111-22-33</p>
            <p>✉ alexey@example.com</p>
        </div>

        <div class="contact-card">
            <h3>Мария Петрова</h3>
            <p>Специалист по двигателям</p>
            <p>📞 +7 (777) 222-33-44</p>
            <p>✉ maria@example.com</p>
        </div>

        <div class="contact-card">
            <h3>Игорь Сидоров</h3>
            <p>Мастер по подвеске</p>
            <p>📞 +7 (777) 333-44-55</p>
            <p>✉ igor@example.com</p>
        </div>

        <div class="contact-card">
            <h3>Елена Кузнецова</h3>
            <p>Администратор / Сервисная поддержка</p>
            <p>📞 +7 (777) 444-55-66</p>
            <p>✉ elena@example.com</p>
        </div>

        <div class="contact-card">
            <h3>Дмитрий Смирнов</h3>
            <p>Электрик / Диагностика</p>
            <p>📞 +7 (777) 555-66-77</p>
            <p>✉ dmitry@example.com</p>
        </div>

        <div class="contact-card">
            <h3>Ольга Васильева</h3>
            <p>Менеджер по клиентам</p>
            <p>📞 +7 (777) 666-77-88</p>
            <p>✉ olga@example.com</p>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)

</body>
</html>
