<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Подключение к базе данных
$host = 'localhost';
$db   = 'autoservice';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения к базе: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $service = trim($_POST['service']);

    if (empty($name) || empty($email) || empty($service)) {
        die("Пожалуйста, заполните все поля.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Неверный формат Email.");
    }

    $stmt = $pdo->prepare("INSERT INTO orders (name, email, service) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $service]);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Заявка отправлена | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
/* Дополнительные стили для сообщения */
.confirmation {
    max-width: 500px;
    margin: 150px auto;
    background: #1a1a1a;
    padding: 40px;
    border-radius: 14px;
    text-align: center;
    box-shadow: 0 0 20px rgba(255,255,255,0.05);
}

.confirmation h2 {
    color: #fff;
    margin-bottom: 20px;
}

.confirmation p {
    color: #ccc;
    margin-bottom: 30px;
}

.confirmation a.button {
    display: inline-block;
    background: #fff;
    color: #000;
    text-decoration: none;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s ease;
}

.confirmation a.button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="confirmation">
    <h2>Заявка успешно отправлена!</h2>
    <p>Спасибо, <?= htmlspecialchars($name) ?>. Мы свяжемся с вами в ближайшее время.</p>
    <a href="index.php" class="button">Вернуться на главную</a>
</div>

</body>
</html>
