<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Магазин | Автосервис</title>
<link rel="stylesheet" href="style.css">
<style>
/* Сетка товаров */
.shop-grid {
    max-width: 1100px;
    margin: 50px auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    text-align: center;
}

.product-card {
    background: #1a1a1a;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 0 15px rgba(255,255,255,0.05);
    transition: 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 25px rgba(255,255,255,0.15);
}

.product-card h3 {
    color: #fff;
    margin-bottom: 10px;
}

.product-card p {
    color: #ccc;
    font-size: 14px;
    margin-bottom: 15px;
}

.product-card .price {
    font-weight: bold;
    color: #fff;
    margin-bottom: 15px;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.card-footer a,
.card-footer button {
    background: #fff;
    color: #000;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: 0.3s ease;
}

.card-footer a:hover,
.card-footer button:hover {
    background: #000;
    color: #fff;
    border: 1px solid #fff;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h1>Магазин</h1>
    <p>Здесь вы можете приобрести товары и услуги для вашего автомобиля:</p>

    <div class="shop-grid">
        <div class="product-card">
            <h3>Масло моторное 5W-40</h3>
            <p>Высококачественное синтетическое масло для любых автомобилей.</p>
            <div class="card-footer">
                <div class="price">4500₸</div>
                <a href="buy.php?product=Масло+моторное+5W-40">Купить сразу</a>
                <form action="add_to_cart.php" method="post" style="display:inline-block;">
                    <input type="hidden" name="product" value="Масло моторное 5W-40">
                    <input type="hidden" name="price" value="4500">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>

        <div class="product-card">
            <h3>Фильтр воздушный</h3>
            <p>Фильтр для чистого воздуха двигателя и оптимальной работы.</p>
            <div class="card-footer">
                <div class="price">1200₸</div>
                <a href="buy.php?product=Фильтр+воздушный">Купить сразу</a>
                <form action="add_to_cart.php" method="post" style="display:inline-block;">
                    <input type="hidden" name="product" value="Фильтр воздушный">
                    <input type="hidden" name="price" value="1200">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>

        <div class="product-card">
            <h3>Шиномонтаж</h3>
            <p>Профессиональная замена и балансировка шин для вашего авто.</p>
            <div class="card-footer">
                <div class="price">3500₸</div>
                <a href="buy.php?product=Шиномонтаж">Купить сразу</a>
                <form action="add_to_cart.php" method="post" style="display:inline-block;">
                    <input type="hidden" name="product" value="Шиномонтаж">
                    <input type="hidden" name="price" value="3500">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>

        <div class="product-card">
            <h3>Диагностика двигателя</h3>
            <p>Полная проверка и диагностика вашего двигателя современным оборудованием.</p>
            <div class="card-footer">
                <div class="price">5000₸</div>
                <a href="buy.php?product=Диагностика+двигателя">Купить сразу</a>
                <form action="add_to_cart.php" method="post" style="display:inline-block;">
                    <input type="hidden" name="product" value="Диагностика двигателя">
                    <input type="hidden" name="price" value="5000">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
