<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Подключение к базе
    $conn = new mysqli("localhost", "root", "", "autoservice");
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Записываем заказ в новую таблицу shop_orders
    $stmt = $conn->prepare("INSERT INTO shop_orders (username, name, email, product, quantity) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $username, $name, $email, $product, $quantity);

    if ($stmt->execute()) {
        header("Location: order_success.php");
        exit();
    } else {
        echo "Ошибка при оформлении заказа: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
