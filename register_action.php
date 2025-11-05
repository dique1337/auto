<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        header("Location: register.php?error=empty");
        exit();
    }

    // Проверяем, есть ли уже такой пользователь
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Пользователь с таким email уже существует
        header("Location: register.php?error=exists");
        exit();
    } else {
        // Хэшируем пароль
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Добавляем пользователя
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            // ✅ После успешной регистрации перекидываем на login.php
            header("Location: login.php?success=registered");
            exit();
        } else {
            // Ошибка при вставке
            header("Location: register.php?error=failed");
            exit();
        }
    }

    $stmt->close();
}
$conn->close();
?>
