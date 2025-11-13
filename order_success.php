<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Заказ оформлен | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
.success-container {
    max-width: 500px;
    margin: 150px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 14px;
    text-align: center;
    color: #fff;
    box-shadow: 0 0 20px rgba(255,255,255,0.05);
}
.success-container a.button {
    display: inline-block;
    background: #fff;
    color: #000;
    text-decoration: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: bold;
    margin-top: 20px;
    transition: 0.3s ease;
}
.success-container a.button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="success-container">
    <h2>✅ Ваш заказ успешно оформлен!</h2>
    <p>Спасибо за покупку. Мы свяжемся с вами для подтверждения.</p>
    <a href="index.php" class="button">Вернуться на главную</a>
</div>

</body>
</html>
