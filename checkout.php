<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Получаем товары из корзины
$stmt = $pdo->prepare("SELECT * FROM user_cart WHERE username=?");
$stmt->execute([$username]);
$cart = $stmt->fetchAll();

// Если корзина пуста, редирект на магазин
if (empty($cart)) {
    header("Location: shop.php");
    exit();
}

// Обработка отправки заказа
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $stmtInsert = $pdo->prepare(
        "INSERT INTO `shop_orders` (username, name, email, product, quantity, price) VALUES (?, ?, ?, ?, ?, ?)"
    );

    foreach ($cart as $item) {
        // Берём цену товара из корзины или задаём вручную
        $price = $item['price'];
        $stmtInsert->execute([
            $username,
            $name,
            $email,
            $item['product'],
            $item['quantity'],
            $price
        ]);
    }

    // Очистка корзины
    $stmtDelete = $pdo->prepare("DELETE FROM user_cart WHERE username=?");
    $stmtDelete->execute([$username]);

    header("Location: order_success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Оформление заказа | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
.checkout-container {
    max-width: 600px;
    margin: 100px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 0 20px rgba(255,255,255,0.05);
    color: #fff;
    text-align: center;
}

.checkout-container h2 {
    margin-bottom: 20px;
}

.checkout-container label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    color: #ccc;
    font-size: 14px;
}

.checkout-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: none;
    background: #0d0d0d;
    color: #fff;
}

.checkout-container button {
    background: #fff;
    color: #000;
    font-weight: bold;
    padding: 12px 25px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
}

.checkout-container button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="checkout-container">
    <h2>Оформление заказа</h2>
    <form method="post">
        <label>Ваше имя</label>
        <input type="text" name="name" required value="<?= htmlspecialchars($username) ?>">

        <label>Email</label>
        <input type="email" name="email" required>

        <h3>Ваши товары:</h3>
        <ul style="text-align:left; margin-bottom:20px;">
            <?php foreach($cart as $item): ?>
                <li><?= htmlspecialchars($item['product']) ?> — <?= $item['quantity'] ?> шт</li>
            <?php endforeach; ?>
        </ul>

        <button type="submit">Подтвердить заказ</button>
    </form>
</div>

</body>
</html>
