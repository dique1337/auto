<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Регистрация | Автосервис</title>
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
</style>
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>
        <form method="post" action="register_action.php">
            <input type="text" name="name" placeholder="Имя пользователя" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="confirm_password" placeholder="Подтвердите пароль" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <div class="links">
            <a href="login.php">Уже есть аккаунт?</a>
        </div>
    </div>
</body>
</html>
