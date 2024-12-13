<?php
// Подключение к базе данных с пользователями (замените значения на свои)
$users_servername = "localhost";
$users_username = "users";
$users_password = "ciKBBbteLdbYsBkN";
$users_dbname = "users";

// Создание соединения с базой данных с пользователями
$users_conn = new mysqli($users_servername, $users_username, $users_password, $users_dbname);

// Проверка соединения с базой данных с пользователями
if ($users_conn->connect_error) {
    die("Connection failed: " . $users_conn->connect_error);
}

// Подключение к базе данных с отзывами (замените значения на свои)
$reviews_servername = "localhost";
$reviews_username = "games";
$reviews_password = "GeLsHNEnm6DtKSJP";
$reviews_dbname = "games";

// Создание соединения с базой данных с отзывами
$reviews_conn = new mysqli($reviews_servername, $reviews_username, $reviews_password, $reviews_dbname);

// Проверка соединения с базой данных с отзывами
if ($reviews_conn->connect_error) {
    die("Connection failed: " . $reviews_conn->connect_error);
}

// Получение значения ID игры из URL
// Получение значения ID игры из URL
if (isset($_GET['id'])) {
    $game_id = $_GET['id'];

    // Подготовка SQL запроса для выборки отзывов с таким же ID игры
    $sql = "SELECT * FROM feedback WHERE AppID = $game_id";
    $result = $reviews_conn->query($sql);

    if ($result->num_rows > 0) {
        // Отобразить каждый отзыв
        while($row = $result->fetch_assoc()) {
            // Получение информации о пользователе из базы данных "users"
            $user_id = $row["UserID"];
            $user_sql = "SELECT * FROM users WHERE id = $user_id";
            $user_result = $users_conn->query($user_sql);
            
            if ($user_result->num_rows > 0) {
                $user_row = $user_result->fetch_assoc();
                
                // Получение Key_value пользователя
                $user_key = $user_row['Key_value'];
                
                // Выполнение запроса к API для получения дополнительной информации о пользователе
                $api_url = "https://elemsocial.com/System/AppAPI/Connect.php?Key=$user_key";
                $user_info_json = file_get_contents($api_url);
                $user_info = json_decode($user_info_json, true);
                
                // Отображение отзыва с информацией о пользователе
                echo '<div class="feedback-info">';
                echo '<img src="https://elemsocial.com/Content/Avatars/' . $user_info['Avatar'] . '">';
                echo '<div class="name">' . htmlspecialchars($user_info['Name']) . '</div>';
                echo '<div class="comment">' . htmlspecialchars($row["Text"]) . '</div>';
                echo '</div>';
            } else {
                echo "Информация о пользователе с ID $user_id не найдена.";
            }
        }
    } else {
        echo '<div style="color:white;">Нет отзывов.</div>';
    }
} else {
    echo "ID игры не указан.";
}



// Закрытие соединений с базами данных
$reviews_conn->close();
$users_conn->close();
?>
