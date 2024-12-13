<?php
session_start();
$Account = null;

setcookie("my_cookie", $value, time() + 3600, "/");

if (isset($_SESSION['Key'])) {
    $url = 'https://elemsocial.com/System/AppAPI/Connect.php?Key=' . $_SESSION['Key'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Ошибка cURL: ' . curl_error($ch);
    } else {
        $array = json_decode($response, true);
        if (isset($array['Username'])) {
            $Account = $array;

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

            // Получение значения куки
            $session_value = $_COOKIE['PHPSESSID'];

            // Проверка существования записи
            $key_value = $_SESSION['Key'];
            $sql_check = "SELECT * FROM users WHERE Key_value = '$key_value'";
            $result_check = $conn->query($sql_check);

            if ($result_check->num_rows == 0) {
                // Вставка данных с использованием значения куки
                $sql_insert = "INSERT INTO users (session, Key_value) VALUES ('$session_value', '$key_value')";
                if ($conn->query($sql_insert) === TRUE) {
                    
                } else {
                    
                }
            } else {
                
            }

            // Генерация HTML кода для массива Links
            $linksHTML = '';
            if (isset($Account['Links']) && is_array($Account['Links'])) {
                foreach ($Account['Links'] as $link) {
                    $linksHTML .= '<div class="custom-container">
                                        <a href="' . $link['Link'] . '">
                                            <img src="MediaArchive/Handexsw.jpg" class="custom-icon">
                                            <span class="custom-site-name">' . $link['Title'] . '</span>
                                        </a>
                                    </div>';
                }
            }

            // Закрываем соединение с базой данных
            $conn->close();
        }
    }
    curl_close($ch);
}
?>