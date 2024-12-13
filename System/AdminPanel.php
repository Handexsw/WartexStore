<?php
$user_servername = "localhost";
$user_username = "users";
$user_password = "ciKBBbteLdbYsBkN";
$user_dbname = "users";

$user_conn = new mysqli($user_servername, $user_username, $user_password, $user_dbname);

if ($user_conn->connect_error) {
    die("User Connection failed: " . $user_conn->connect_error);
}

$user_query = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
$user_result = $user_conn->query($user_query);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $last_user_id = $user_row["id"];
} else {
    $last_user_id = "0";
}

$user_conn->close();

$game_servername = "localhost";
$game_username = "games";
$game_password = "GeLsHNEnm6DtKSJP";
$game_dbname = "games";

$game_conn = new mysqli($game_servername, $game_username, $game_password, $game_dbname);

if ($game_conn->connect_error) {
    die("Game Connection failed: " . $game_conn->connect_error);
}

$game_query = "SELECT id FROM games ORDER BY id DESC LIMIT 1";
$game_result = $game_conn->query($game_query);

if ($game_result->num_rows > 0) {
    $game_row = $game_result->fetch_assoc();
    $last_game_id = $game_row["id"];
} else {
    $last_game_id = "0";
}


$game_conn->close();
$feedback_servername = "localhost";
$feedback_username = "games"; // Предполагая, что feedback база данных в той же, что и games
$feedback_password = "GeLsHNEnm6DtKSJP"; // Пароль для доступа к базе данных feedback
$feedback_dbname = "games"; // Имя базы данных feedback

$feedback_conn = new mysqli($feedback_servername, $feedback_username, $feedback_password, $feedback_dbname);

if ($feedback_conn->connect_error) {
    die("Feedback Connection failed: " . $feedback_conn->connect_error);
}

$feedback_query = "SELECT id FROM feedback ORDER BY id DESC LIMIT 1";
$feedback_result = $feedback_conn->query($feedback_query);

if ($feedback_result->num_rows > 0) {
    $feedback_row = $feedback_result->fetch_assoc();
    $last_feedback_id = $feedback_row["id"];
} else {
    $last_feedback_id = "0";
}

$feedback_conn->close();

?>