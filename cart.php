<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Получаем товары пользователя из базы
$stmt = $pdo->prepare("SELECT * FROM user_cart WHERE username=?");
$stmt->execute([$username]);
$cart = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Корзина | Автосервис</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="cart-container">
    <h2>Ваша корзина</h2>

    <?php if (empty($cart)) : ?>
        <p>Корзина пуста.</p>
    <?php else : ?>
        <form action="update_cart_db.php" method="post">
            <?php $total = 0; ?>
            <?php foreach($cart as $item): ?>
                <?php $subtotal = $item['price'] * $item['quantity']; ?>
                <?php $total += $subtotal; ?>
                <div class="cart-item">
                    <div><?= $item['product'] ?></div>
                    <div><?= $item['price'] ?>₸</div>
                    <div>
                        <input type="number" name="quantities[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1">
                    </div>
                    <div><?= $subtotal ?>₸</div>
                    <div>
                        <a href="remove_from_cart_db.php?id=<?= $item['id'] ?>" style="color:red;">Удалить</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="cart-total">Итого: <?= $total ?>₸</div>
            <div class="cart-buttons">
                <button type="submit">Обновить корзину</button>
                <a href="checkout.php">Оформить заказ</a>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
