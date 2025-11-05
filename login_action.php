<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // подключаем твою базу

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=empty");
        exit();
    }

    // Проверяем, есть ли пользователь
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
    if (!$stmt) {
        die("Ошибка SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // пользователь не найден
        header("Location: login.php?error=nouser");
        exit();
    }

    $user = $result->fetch_assoc();

    // Проверяем пароль
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['name']; // сохраняем в сессию
        header("Location: index.php"); // перекидываем на главную
        exit();
    } else {
        // неверный пароль
        header("Location: login.php?error=wrongpassword");
        exit();
    }
}
?>
