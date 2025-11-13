<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileName = $_FILES['avatar']['name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileType = $_FILES['avatar']['type'];
    $fileNameCmps = pathinfo($fileName);
    $fileExtension = strtolower($fileNameCmps['extension']);

    // Разрешенные расширения
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedExts)) {
        // Создаем уникальное имя файла
        $newFileName = $username . '_' . time() . '.' . $fileExtension;
        $uploadFileDir = 'avatars/';
        $dest_path = $uploadFileDir . $newFileName;

        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Получаем старую аватарку
            $stmt = $pdo->prepare("SELECT avatar FROM users WHERE name=?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            if ($user && $user['avatar'] && $user['avatar'] !== 'avatars/default.png' && file_exists($user['avatar'])) {
                unlink($user['avatar']); // удаляем старую
            }

            // Обновляем путь к аватарке в базе
            $stmt = $pdo->prepare("UPDATE users SET avatar=? WHERE name=?");
            $stmt->execute([$dest_path, $username]);

            $_SESSION['success'] = "Аватар успешно обновлен!";
        } else {
            $_SESSION['error'] = "Ошибка при загрузке файла.";
        }
    } else {
        $_SESSION['error'] = "Недопустимый формат файла. Разрешено: jpg, jpeg, png, gif.";
    }
} else {
    $_SESSION['error'] = "Файл не выбран или произошла ошибка загрузки.";
}

header("Location: profile.php");
exit();
