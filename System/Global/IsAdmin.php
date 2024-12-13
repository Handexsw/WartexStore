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

// Получение значения Verification и Admin из базы данных
$sql_verification = "SELECT Verification, Admin FROM users WHERE Key_value = '$key_value'";
$result_verification = $conn->query($sql_verification);

$verification_array = array(); // Массив для хранения значения 1, если Verification равно 1

if ($result_verification->num_rows > 0) {
    while ($row = $result_verification->fetch_assoc()) {
        // Если Verification и Admin равны 1, добавляем 1 в массив
        if ($row['Admin'] == 1) {
            // Если Verification и Admin равны 1, добавляем 1 в массив
            $verification_array[] = 1;
        }
    }
}

// Проверка, является ли пользователь администратором
if (count($verification_array) > 0) {
    // Пользователь администратор, разрешить доступ к странице
    // Здесь можно вставить код для отображения страницы для администратора
} else {
    // Пользователь не администратор, перенаправление на главную страницу
    header("Location: index.php"); // Измените "index.php" на путь к вашей главной странице
    exit(); // Завершение выполнения скрипта после перенаправления
}

// Закрываем соединение с базой данных
$conn->close();

?>
