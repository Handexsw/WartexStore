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
$sql_verification = "SELECT Admin FROM users WHERE Key_value = '$key_value'";
$result_verification = $conn->query($sql_verification);

$PanelRay = array(); // Массив для хранения значения 1, если Verification равно 1

if ($result_verification->num_rows > 0) {
    while ($row = $result_verification->fetch_assoc()) {
        // Если Verification и Admin равны 1, добавляем 1 в массив
        if  ($row['Admin'] == 1) {
            // Если Verification и Admin равны 1, добавляем 1 в массив
            $PanelRay[] = 1;
        }
    }
}
$conn->close();

?>
