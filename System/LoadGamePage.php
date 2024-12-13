<?php
$servername = "localhost";
$username = "games";
$password = "GeLsHNEnm6DtKSJP";
$dbname = "games";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $game_id = $_GET['id'];

    // Сохраняем айди игры в куки на один час
    setcookie('game_id', $game_id, time() + 3600, '/');

    $sql = "SELECT * FROM games WHERE id = :game_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':game_id', $game_id, PDO::PARAM_INT);
    $stmt->execute();

    $game_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($game_data) {
        // Ваш код обработки данных игры
    } else {
        header("Location: index.php");
        exit();
    }
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$conn = null;
?>
