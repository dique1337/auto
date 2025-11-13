<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM user_cart WHERE id=?");
    $stmt->execute([$_GET['id']]);
}

header("Location: cart.php");
exit();
?>
