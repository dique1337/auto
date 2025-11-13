<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
$product = isset($_GET['product']) ? htmlspecialchars($_GET['product']) : '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Оформление покупки | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
.buy-form-container {
    max-width: 500px;
    margin: 100px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 0 20px rgba(255,255,255,0.05);
    text-align: center;
}

.buy-form-container h2 {
    color: #fff;
    margin-bottom: 20px;
}

.buy-form-container label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    color: #ccc;
    font-size: 14px;
}

.buy-form-container input,
.buy-form-container select,
.buy-form-container button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: none;
}

.buy-form-container input, .buy-form-container select {
    background: #0d0d0d;
    color: #fff;
}

.buy-form-container button {
    background: #fff;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
}

.buy-form-container button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="buy-form-container">
    <h2>Оформление покупки</h2>
    <form action="process_buy.php" method="post">
        <label>Ваше имя</label>
        <input type="text" name="name" required value="<?= $username ?>">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Выбранный товар</label>
        <select name="product" required>
            <option value="<?= $product ?>"><?= $product ?></option>
            <option value="Масло моторное 5W-40">Масло моторное 5W-40</option>
            <option value="Фильтр воздушный">Фильтр воздушный</option>
            <option value="Шиномонтаж">Шиномонтаж</option>
            <option value="Диагностика двигателя">Диагностика двигателя</option>
        </select>

        <label>Количество</label>
        <input type="number" name="quantity" min="1" value="1" required>

        <button type="submit">Оформить заказ</button>
    </form>
</div>

</body>
</html>
