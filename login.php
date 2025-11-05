<?php
// Если есть ошибка в параметрах URL — сохраняем её в переменную
$error = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'nouser') {
        $error = 'Пользователь не найден.';
    } elseif ($_GET['error'] === 'wrongpassword') {
        $error = 'Неверный пароль.';
    } elseif ($_GET['error'] === 'empty') {
        $error = 'Заполните все поля.';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Вход | Автосервис</title>
<style>
    body {
        margin: 0;
        padding: 0;
        background: #111;
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        background: #1a1a1a;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(255, 255, 255, 0.1);
        width: 350px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .container:hover {
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
    }

    h2 {
        margin-bottom: 25px;
        font-weight: 400;
        letter-spacing: 1px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: none;
        border-radius: 6px;
        background: #2a2a2a;
        color: #fff;
        font-size: 14px;
        transition: 0.3s;
    }

    input:focus {
        background: #333;
        outline: none;
        box-shadow: 0 0 5px #fff;
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        background: #fff;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #e0e0e0;
    }

    .links {
        margin-top: 15px;
    }

    .links a {
        color: #ccc;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
    }

    .links a:hover {
        color: #fff;
    }

    .error-box {
        margin-bottom: 15px;
        background: rgba(255, 0, 0, 0.1);
        color: #ff4d4d;
        padding: 10px;
        border-radius: 6px;
        font-size: 14px;
        border: 1px solid rgba(255, 0, 0, 0.3);
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Вход</h2>

        <?php if (!empty($error)): ?>
            <div class="error-box"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="login_action.php">
            <input type="text" name="username" placeholder="Имя пользователя" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
        </form>
        <div class="links">
            <a href="register.php">Нет аккаунта?</a>
        </div>
    </div>
</body>
</html>
