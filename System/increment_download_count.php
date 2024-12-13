<?php

if (isset($_GET['id'])) {
    $game_id = $_GET['id'];
    
    $servername = "localhost";
    $username = "games";
    $password = "GeLsHNEnm6DtKSJP";
    $dbname = "games";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }

    // Выполним запрос к базе данных для увеличения счетчика загрузок
    $sql_update_downloads = "UPDATE games SET Downloaded = Downloaded + 1 WHERE id = $game_id";
    if ($conn->query($sql_update_downloads) === TRUE) {
        echo "Счетчик загрузок обновлен успешно";
    } else {
        echo "Ошибка при обновлении счетчика загрузок: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Идентификатор игры не был передан.";
}

?>
