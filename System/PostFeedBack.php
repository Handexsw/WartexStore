<?php
session_start(); // Запускаем сессию

// Проверяем, был ли запрос методом POST и было ли отправлено поле обратной связи
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["feedbackInput"])) {
    // Проверяем наличие ключа в сессии
    if(isset($_SESSION['Key'])){
        // Подключение к базе данных пользователей
        $servername_users = "localhost";
        $username_users = "users";
        $password_users = "ciKBBbteLdbYsBkN";
        $dbname_users = "users";

        $conn_users = new mysqli($servername_users, $username_users, $password_users, $dbname_users);

        // Проверяем соединение с базой данных пользователей
        if ($conn_users->connect_error) {
            die("Connection failed: " . $conn_users->connect_error);
        }

        // Получаем значение из сессии
        $key_value = $_SESSION['Key'];

        // Используем подготовленные выражения для безопасного выполнения запроса
        $query = $conn_users->prepare("SELECT id FROM users WHERE Key_value = ?");
        $query->bind_param("s", $key_value);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            // Если пользователь найден, получаем его ID
            $row = $result->fetch_assoc();
            $user_id = $row["id"];

            // Закрываем запрос и соединение с базой данных пользователей
            $query->close();
            $conn_users->close();

            // Получаем значение AppID из куки
            $app_id = isset($_COOKIE['game_id']) ? $_COOKIE['game_id'] : null;

            // Проверяем, что app_id не пустой
            if(empty($app_id)) {
                die("AppID is required");
            }

            // Подключение к базе данных игр
            $servername_games = "localhost"; 
            $username_games = "games"; 
            $password_games = "GeLsHNEnm6DtKSJP"; 
            $dbname_games = "games"; 

            $conn_games = new mysqli($servername_games, $username_games, $password_games, $dbname_games);

            // Проверяем соединение с базой данных игр
            if ($conn_games->connect_error) {
                die("Connection failed: " . $conn_games->connect_error);
            }

            // Получаем комментарий из формы и фильтруем его
$comment = isset($_POST["feedbackInput"]) ? strip_tags($_POST["feedbackInput"]) : '';

// Используем подготовленные выражения для безопасного выполнения запроса
$insert_query = $conn_games->prepare("INSERT INTO feedback (UserID, Text, AppID) VALUES (?, ?, ?)");
$insert_query->bind_param("iss", $user_id, $comment, $app_id);


            if ($insert_query->execute()) {
                echo "Feedback submitted successfully";
            } else {
                echo "Error: " . $insert_query->error;
            }

            // Закрываем запрос и соединение с базой данных игр
            $insert_query->close();
            $conn_games->close();
        } else {
            echo "User not found";
        }
    } else {
        echo "Session Key not set"; // Если ключ не установлен в сессии
    }
}
?>
