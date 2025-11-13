<footer>
    <div class="footer-content">
        <div class="footer-logo">Автосервис</div>
        <p>© <?= date("Y") ?> Автосервис. Все права защищены.</p>
        <p>📞 +7 (777) 123-45-67 | ✉ info@autoservice.kz</p>
        <div class="footer-links">
            <a href="index.php">Главная</a> |
            <a href="services.php">Услуги</a> |
            <a href="contacts.php">Контакты</a> |
            <a href="about.php">О нас</a>
        </div>
    </div>
</footer>

<style>
/* Фиксированный футер */
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #111;
    color: #ccc;
    padding: 15px 20px;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 -4px 10px rgba(255,255,255,0.05);
    z-index: 999;
}

.footer-logo {
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 5px;
}

.footer-links {
    margin-top: 5px;
}

.footer-links a {
    color: #ccc;
    text-decoration: none;
    margin: 0 5px;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #fff;
}

/* Чтобы контент не перекрывался футером */
body {
    padding-bottom: 70px; /* высота футера + немного отступа */
}
</style>
