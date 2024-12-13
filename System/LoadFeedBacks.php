<?php

// Подключение к базе данных games
$mysqli_games = new mysqli("games", "GeLsHNEnm6DtKSJP", "feedbacks");

// Проверка соединения
if ($mysqli_games->connect_errno) {
    echo "Не удалось подключиться к MySQL (games): " . $mysqli_games->connect_error;
    exit();
}

// Подключение к базе данных users
$mysqli_users = new mysqli("users", "ciKBBbteLdbYsBkN", "users");

// Проверка соединения
if ($mysqli_users->connect_errno) {
    echo "Не удалось подключиться к MySQL (users): " . $mysqli_users->connect_error;
    exit();
}

// Получение ID игры
$game_id = $_GET['game_id']; // Предположим, что ID игры передается через GET-параметр

// Подготовка SQL-запроса для получения отзывов с данными о пользователе из базы данных games
$sql = "SELECT games.*, users.name AS user_name, users.avatar AS user_avatar
        FROM games.reviews AS games
        JOIN users.reviews AS users ON games.user_id = users.id
        WHERE games.game_id = $game_id";

// Выполнение запроса к базе данных games
$result_games = $mysqli_games->query($sql);

// Проверка наличия отзывов
if ($result_games->num_rows > 0) {
    // Если отзывы есть, загружаем их
    $reviews = array();
    while ($row = $result_games->fetch_assoc()) {
        // Подготовка данных для отображения отзывов
        $review_data = array(
            'game_id' => $row['game_id'], // ID игры
            'text' => $row['review_text'], // Текст отзыва
            'user_id' => $row['user_id'], // ID пользователя
            'user_name' => $row['user_name'], // Имя пользователя
            'user_avatar' => $row['user_avatar'] // Аватар пользователя
        );
        
        // Добавление отзыва в массив
        $reviews[] = $review_data;
    }
    
    // Вывод отзывов в нужном формате (например, JSON)
    echo json_encode($reviews);
} else {
    // Если отзывов нет, возвращаем сообщение об отсутствии отзывов
    echo "Отзывов пока нет";
}

// Получение ключей из базы данных users
$sql = "SELECT key_value FROM users";

// Выполнение запроса к базе данных users
$result_users = $mysqli_users->query($sql);

// Проверка наличия данных
if ($result_users->num_rows > 0) {
    // Если есть данные, обрабатываем их
    while ($row = $result_users->fetch_assoc()) {
        // Получаем ключ из результата запроса
        $key = $row['key_value'];
        
        // Используем ключ для доступа к данным через API (здесь предполагается использование какого-то API)
        // Например, отправляем запрос с использованием ключа
        $api_data = your_api_function($key);
        
        // Обрабатываем данные от API (например, выводим их)
        echo json_encode($api_data);
    }
} else {
    // Если нет данных, выводим сообщение об отсутствии данных
    echo "Нет данных для обработки";
}

// Закрытие соединения с базой данных games
$mysqli_games->close();

// Закрытие соединения с базой данных users
$mysqli_users->close();

// Функция для запроса данных через API
function your_api_function($key) {
    // Ваш код для запроса данных через API с использованием ключа
}

?>
