<?php
session_start();
require 'db_connect.php'; // подключение к базе данных

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $products = $_POST['products'] ?? [];

    foreach ($products as $product => $quantity) {
        $product = htmlspecialchars($product);
        $quantity = intval($quantity);

        // Запись в базу shop_orders
        $stmt = $pdo->prepare("INSERT INTO shop_orders (username, name, email, product, quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_SESSION['username'], $name, $email, $product, $quantity]);
    }

    // Очистка корзины
    unset($_SESSION['cart']);

    header("Location: order_success.php");
    exit();
}
?>
