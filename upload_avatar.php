<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$login = $_SESSION['username'];

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileName = $_FILES['avatar']['name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileType = $_FILES['avatar']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedExts)) {
        $newFileName = $login . '_' . time() . '.' . $fileExtension;
        $uploadFileDir = 'avatars/';
        $destPath = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Обновляем путь к аватару в базе
            $stmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE name = ?");
            $stmt->execute([$destPath, $login]);
            header("Location: profile.php?success=1");
            exit();
        } else {
            $error = "Ошибка при загрузке файла.";
        }
    } else {
        $error = "Недопустимый формат файла. Разрешены: jpg, png, gif.";
    }
} else {
    $error = "Файл не выбран или произошла ошибка.";
}

if (isset($error)) {
    header("Location: profile.php?error=" . urlencode($error));
    exit();
}
