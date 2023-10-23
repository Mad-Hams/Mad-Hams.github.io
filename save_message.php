<?php
// Подключение к базе данных
$servername = "localhost"; // Адрес сервера БД
$username = "root"; // Имя пользователя
$password = ""; // Пароль пользователя
$dbname = "test1"; // Имя базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка на успешное подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение текста сообщения из POST-запроса
$message = $_POST['message'];

// Вставка сообщения в таблицу
$sql = "INSERT INTO chat_messages (message) VALUES ('$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения с базой данных
$conn->close();
?>
