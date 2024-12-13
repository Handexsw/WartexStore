<?php

require 'System/AdminPanel.php';
require 'System/Global/AccountConnect.php';
require_once 'System/Global/IsAdmin.php';
require 'System/Global/IsPanel.php';

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Настройки -->
    <title>WartexStore</title>
    <link rel="icon" type="iconsite" href="MediaArchive/System/iconsite.png">
    <meta property="og:title" content="WartexStore - game for everyone.">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Интерфейс -->
    <link rel="stylesheet" href="System/UI/Style.css" id="theme">
    <link rel="stylesheet" href="System/UI/MobileStyle.css" media="(max-width: 768px)">
    <!-- Подключение шрифтов -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Скрипты -->
    <script src="System/JavaScript/index.js"></script>
</head>
<body>
    <header>
        <img src="MediaArchive/System/iconsite.png">
        <a href="index.php" class="desktop-only">STORE</a>
        <a href="Library.php" class="desktop-only">LIBRARY</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="active desktop-only">PANEL</a>
        <?php } ?>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search">
        </div>
        <div>
            <?php if ($Account) : ?>
                <a href="Profile.php">
                    <div class="PROFICO">
                        <img src="https://elemsocial.com/Content/Avatars/<?php echo $Account['Avatar']; ?>">
                    </div>
                </a>
            <?php else : ?>
                <a href="Auth.php">
                    <img class="PROFICO" src="https://elemsocial.com/Content/Posts/Images/Image_1c562402a419ac27ddaf89dd4ee72001.jpeg" alt="Описание изображения">
                </a>
            <?php endif; ?>
        </div>
    </header>
    <div style='margin-top:100px;'></div>
    <div class="blockeru">
        <div class="containerss">
            <!-- Контейнер для последнего ID пользователя -->
            <div class="user-container">
                <h2>Registered users</h2>
                <div style="margin-bottom:10px;"></div>
                <p style='position: relative;
            top:90px; left:10px; font-size: 50px;'><?php echo $last_user_id; ?></p>
                <i class="icon fa-solid fa-user-plus"></i>
            </div>
        </div>
        <div class="containerss">
            <!-- Контейнер для последнего ID пользователя -->
            <div class="user-container">
                <h2>Blocked Users</h2>
                <div style="margin-bottom:10px;"></div>
                <p style='position: relative;
            top:90px; left:10px; font-size: 50px;'>0</p>
                <i class="icon fa-solid fa-user-minus"></i>
            </div>
        </div>

        <div class="containerss">
            <!-- Контейнер для последнего ID игры -->
            <div class="game-container">
                <h2>Games have been published</h2>
                <div style="margin-bottom:10px;"></div>
                <p style='position: relative;
            top:60px; left:10px; font-size: 50px;'><?php echo $last_game_id; ?></p>
                <i style="bottom:30px" class="icon fa-solid fa-upload"></i>
            </div>
        </div>
        <div class="containerss">
            <!-- Контейнер для последнего ID игры -->
            <div class="game-container">
                <h2>Reviews left</h2>
                <div style="margin-bottom:10px;"></div>
                <p style='position: relative;
            top:90px; left:10px; font-size: 50px;'><?php echo $last_feedback_id; ?></p>
                <i class="icon fa-solid fa-comment"></i>
            </div>
        </div>
    </div>
    <blokeru>
    <div class="containerss">
        <!-- Контейнер для управления подпиской -->
        <div class="admin-panel">
            <div class="subscription-container">
                <h2>Список сгенерированных кодов</h2>
                <button id="generateCodeButton">Сгенерировать код</button>
                <ul id="generatedCodesList">
                    <!-- Сюда будут добавляться сгенерированные коды -->
                </ul>
            </div>
        </div>
        <div class="admin-panel">
            <div class="users-container">
                <h2>Список пользователей с подпиской Prime</h2>
                <ul id="subscribedUsersList">
                    <!-- Сюда будут добавляться пользователи с подпиской -->
                </ul>
                </div>
            </div>
        </div>
    </blokeru>

<div class="mobile-nav">
        <a href="index.php" class="nav-item"><i class="fas fa-shopping-cart fa-lg"></i> Store</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-book-open fa-lg"></i> Library</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-cog fa-lg"></i> Settings</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="nav-item active"><i class="fas fa-tools fa-lg"></i> Panel</a>
        <?php } ?>
    </div>
</body>
</html>
<script>
    // Список для хранения сгенерированных кодов
    let generatedCodes = [];

    // Функция для генерации случайного кода
    function generateCode() {
        const code = Math.random().toString(36).substring(2, 8).toUpperCase();
        generatedCodes.push(code);
        return code;
    }

    // Обработчик клика по кнопке "Сгенерировать код"
    document.getElementById('generateCodeButton').addEventListener('click', function() {
        const code = generateCode();
        const codesList = document.getElementById('generatedCodesList');
        const listItem = document.createElement('li');
        listItem.textContent = code;
        codesList.appendChild(listItem);
    });

    // Добавьте вашу логику для получения списка пользователей с подпиской и их отображения в #subscribedUsersList
</script>

