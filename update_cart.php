<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $id => $qty) {
        $qty = max(1, intval($qty));
        $stmt = $pdo->prepare("UPDATE user_cart SET quantity=? WHERE id=?");
        $stmt->execute([$qty, $id]);
    }
}

header("Location: cart.php");
exit();
?>
