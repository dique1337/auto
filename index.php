<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная — Автосервис</title>
    <link rel="stylesheet" href="style.css">
=======
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Главная | Автосервис</title>
<link rel="stylesheet" href="style.css">
>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
</head>
<body>

<?php include 'header.php'; ?>

<main>
<<<<<<< HEAD
    <section class="intro">
        <h1>Добро пожаловать в наш автосервис</h1>
        <p>Мы специализируемся на ремонте, обслуживании и диагностике автомобилей любых марок и моделей.</p>
        <p>Надёжность, качество и современный подход — наша гарантия вашего спокойствия на дороге.</p>

        <div class="button-group">
            <a href="services.php">Наши услуги</a>
            <a href="contacts.php">Связаться с нами</a>
        </div>
    </section>
</main>

=======
    <h1>Добро пожаловать, <?= $username ?>!</h1>
    <p>Мы рады видеть вас в нашем автосервисе. Выберите услугу ниже.</p>

    <div class="services">
        <div class="card">
            <h3>Диагностика автомобиля</h3>
            <p>Полная проверка состояния авто современным оборудованием.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>

        <div class="card">
            <h3>Замена масла</h3>
            <p>Быстро и профессионально заменим масло и фильтры.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>

        <div class="card">
            <h3>Шиномонтаж</h3>
            <p>Замена и балансировка шин для безопасного вождения.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>

        <div class="card">
            <h3>Ремонт тормозной системы</h3>
            <p>Обслуживание и замена тормозных колодок и дисков.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>

        <div class="card">
            <h3>Замена аккумулятора</h3>
            <p>Быстрая диагностика и установка нового аккумулятора.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>

        <div class="card">
            <h3>Чистка кондиционера</h3>
            <p>Обеспечиваем свежий воздух и правильную работу кондиционера.</p>
            <a href="services.php" class="button">Подробнее</a>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
>>>>>>> 1781d4e (Обновлено: Главная, услуги, контакты, о нас. Добавлено: футтер, магазин, корзина, профиль.)
</body>
</html>
