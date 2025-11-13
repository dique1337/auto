<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = htmlspecialchars($_POST['product']);
    $price = floatval($_POST['price']);
    $quantity = 1;

    // Проверяем, есть ли уже товар в корзине
    $stmt = $pdo->prepare("SELECT quantity FROM user_cart WHERE username=? AND product=?");
    $stmt->execute([$username, $product]);
    $row = $stmt->fetch();

    if ($row) {
        $stmt = $pdo->prepare("UPDATE user_cart SET quantity = quantity + 1 WHERE username=? AND product=?");
        $stmt->execute([$username, $product]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO user_cart (username, product, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $product, $quantity, $price]);
    }

    header("Location: cart.php");
    exit();
}
?>
