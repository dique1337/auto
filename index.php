<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная — Автосервис</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<main>
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

</body>
</html>
