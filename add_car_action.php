<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "autoservice");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image_url = trim($_POST['image_url']);

    if (!empty($name) && !empty($description) && !empty($image_url)) {
        $stmt = $conn->prepare("INSERT INTO cars (name, description, image_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $description, $image_url);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Ошибка добавления в базу: " . $conn->error;
        }
    } else {
        echo "Заполните все поля.";
    }
}

$conn->close();
?>
