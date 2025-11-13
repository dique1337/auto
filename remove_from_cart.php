<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['product']) && isset($_SESSION['cart'][$_GET['product']])) {
    unset($_SESSION['cart'][$_GET['product']]);
}

header("Location: cart.php");
exit();
?>
