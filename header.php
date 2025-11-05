<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="logo">Автосервис</div>

    <nav>
        <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Главная</a>
        <a href="services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">Услуги</a>
        <a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contacts.php' ? 'active' : '' ?>">Контакты</a>
    </nav>

    <div class="user">
        <?php if (isset($_SESSION['username'])): ?>
            <span class="username" onclick="toggleMenu()"><?= htmlspecialchars($_SESSION['username']); ?> ▼</span>
        <?php else: ?>
            <a href="login.php" class="profile-link">Войти</a>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
    <div class="profile-menu" id="profileMenu">
        <a href="logout.php">Выйти</a>
    </div>
    <?php endif; ?>
</header>

<script>
function toggleMenu() {
    const menu = document.getElementById('profileMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}
document.addEventListener('click', (e) => {
    const menu = document.getElementById('profileMenu');
    const username = document.querySelector('.username');
    if (menu && !menu.contains(e.target) && !username.contains(e.target)) {
        menu.style.display = 'none';
    }
});
</script>
