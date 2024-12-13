<?php

if (!function_exists('displayGame')) {
    function displayGame($row, &$displayed_games) {
        $game_file_path = 'GameArchive/' . $row["file"];
        $avatar_file_path = 'MediaArchive/' . $row["avatar"];
        
        if ($row['game'] == 1 && !in_array($row['id'], $displayed_games)) { // Додано перевірку на значення game
            echo "<app2>";
            echo "<div class='inner-container'>";
            echo "<a href='App.php?id=" . $row['id'] . "'><img src='" . $avatar_file_path . "' ></a>";
            echo "<appstext>" . $row["name"] . "</appstext>";
            echo "<a href='" . $game_file_path . "' download><div class='draggable-button' id='draggableButton'>Download</div></a>";
            echo "</div>";
            echo "</app2>";

            $displayed_games[] = $row['id'];
        }
    }
}

$servername = "localhost";
$username = "games";
$password = "GeLsHNEnm6DtKSJP";
$dbname = "games";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}

$sql_all_games = "SELECT * FROM games ORDER BY RAND()"; // Получаем игры в случайном порядке
$result_all_games = $conn->query($sql_all_games);

$displayed_games = array();

if ($result_all_games->num_rows > 0) {
    while($row = $result_all_games->fetch_assoc()) {
        displayGame($row, $displayed_games);
    }
}

$conn->close();
?>