<?php
$host = "localhost";
$user = "root";   // логин phpMyAdmin
$pass = "";       // пароль (по умолчанию пустой)
$db   = "autoservice"; // имя твоей базы

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Ошибка подключения к базе: " . $conn->connect_error);
}
?>
