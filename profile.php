<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Получаем данные пользователя
$stmt = $pdo->prepare("SELECT * FROM users WHERE name=?");
$stmt->execute([$username]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Профиль | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
.profile-container {
    max-width: 500px;
    margin: 80px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 0 20px rgba(255,255,255,0.05);
    text-align: center;
}

.profile-avatar p {
    margin-bottom: 10px;
    font-weight: bold;
    color: #fff;
}

.profile-avatar img {
    display: block;
    margin: 0 auto 15px;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 2px solid #fff;
}

.profile-avatar button {
    background: #fff;
    color: #000;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
}

.profile-avatar button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}

#avatar-file, #upload-btn {
    display: none;
    margin-top: 10px;
}

.profile-info {
    text-align: left;
    margin-top: 30px;
}

.profile-info p {
    font-size: 16px;
    color: #ccc;
    margin: 8px 0;
}
</style>
</head>
<body>
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color:lime;text-align:center;margin-top:10px'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo "<p style='color:red;text-align:center;margin-top:10px'>{$_SESSION['error']}</p>";
    unset($_SESSION['error']);
}
?>

<?php include 'header.php'; ?>

<div class="profile-container">
    <div class="profile-avatar">
        <p>Аватар</p>
        <img src="<?= htmlspecialchars($user['avatar'] ?? 'avatars/default.png') ?>" alt="Аватар">
        <form action="change_avatar.php" method="post" enctype="multipart/form-data">
            <button type="button" id="change-avatar-btn">Сменить аватарку</button>
            <input type="file" name="avatar" id="avatar-file" accept="image/*">
            <button type="submit" id="upload-btn">Загрузить</button>
        </form>
    </div>

    <div class="profile-info">
        <p><b>Логин:</b> <?= htmlspecialchars($user['name']) ?></p>
        <p><b>Email:</b> <?= htmlspecialchars($user['email']) ?></p>
    </div>
</div>

<script>
document.getElementById('change-avatar-btn').addEventListener('click', function() {
    document.getElementById('avatar-file').style.display = 'block';
    document.getElementById('upload-btn').style.display = 'inline-block';
    this.style.display = 'none';
});
</script>

</body>
</html>
