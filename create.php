<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка на успешное подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение текста сообщения из POST-запроса
$name = $_POST['name'];
$sname = $_POST['sname'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Вставка сообщения в таблицу с использованием подготовленного запроса
$sql = "INSERT INTO users (nameuser, usersname, phone, message) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $sname, $phone, $message);

if ($stmt->execute()) {
    echo "Данные успешно добавлены в базу данных.";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>