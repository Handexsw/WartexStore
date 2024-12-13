<?php

// Подключение к базе данных (замените данными вашей БД)
$db_host = 'localhost';
$db_user = 'users';
$db_password = 'ciKBBbteLdbYsBkN';
$db_name = 'users';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение значения Verification из базы данных
$sql_verification = "SELECT Verification FROM users WHERE Key_value = '$key_value'";
$result_verification = $conn->query($sql_verification);

$verification_array = array(); // Массив для хранения значения 1, если Verification равно 1

if ($result_verification->num_rows > 0) {
    while ($row = $result_verification->fetch_assoc()) {
        // Если Verification равно 1, добавляем 1 в массив
        if ($row['Verification'] == 1) {
            // Если Verification равно 1, добавляем 1 в массив
            $verification_array[] = 1;
        }
    }
}

// Закрываем соединение с базой данных
$conn->close();

?>
