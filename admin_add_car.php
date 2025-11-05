<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "autoservice";
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    $stmt = $conn->prepare("INSERT INTO cars (name, description, image, link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $image, $link);
    $stmt->execute();
    echo "<p style='color:green;'>✅ Машина добавлена!</p>";
}
?>
<form method="post" style="max-width:400px;margin:40px auto;">
    <h2>Добавить автомобиль</h2>
    <input type="text" name="name" placeholder="Название" required><br><br>
    <textarea name="description" placeholder="Описание" required></textarea><br><br>
    <input type="text" name="image" placeholder="Путь к изображению (img/название.jpg)" required><br><br>
    <input type="text" name="link" placeholder="Ссылка на подробнее (необязательно)"><br><br>
    <button type="submit">Добавить</button>
</form>
