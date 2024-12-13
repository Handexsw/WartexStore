<?php

require 'System/Global/AccountConnect.php';
require 'System/LoadGamePage.php';
require 'System/Global/IsPanel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Настройки -->
    <title><?php echo $game_data['name']; ?></title>
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
</head>

<body>
    <header>
        <img src="MediaArchive/System/iconsite.png">
        <a href="index.php" class="active desktop-only">STORE</a>
        <a href="Library.php" class="desktop-only">LIBRARY</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="desktop-only">PANEL</a>
        <?php } ?>
        <div class="search-container">
            <input style="border:0;" type="text" id="searchInput" placeholder="Search">
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
    <div style="padding-left: 515px;">
        <img style="opacity: 0.2;position: absolute;top: -100px;z-index: -1;;height: 500px;position: absolute;top: 80px;left: 0;width: 100%;height: 40%;object-fit: cover;border-radius: 10px;background-size: 100%;background-position: center center;background-repeat: no-repeat;filter: blur(40px) opacity(0.8);transform: translate3d(0px, 0px, 0px);"src="MediaArchive/<?php echo $game_data['avatar']; ?>">
    </div>
    
    <div class="Content">
        <div class="AppPage">
            <div class="UI-Block Info">
                <blur>
                    <img class="Icon" src="MediaArchive/<?php echo $game_data['avatar']; ?>">
                </blur>
                <div class="TextInfo">
                    <div class="Title"><?php echo $game_data['name']; ?></div>
                    <div class="Developer"><?php echo $game_data['developer']; ?></div>
                </div>
            </div>
            <div class="Buttons">
               <a href='GameArhive/<?php echo $game_data['file']; ?>' download>
                    <button class="Download" style="font-family: Raleway; font-weight: 500;">Download</button>
               </a>

                <button class="Add" style="font-family: Raleway;font-weight: 500;"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m0 0h24v24h-24z" opacity="0" transform="matrix(-1 0 0 -1 24 24)"></path><path d="m19 11h-6v-6a1 1 0 0 0 -2 0v6h-6a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z"></path></svg>Add</button>
            </div>
            <div style="background-color: rgba(18, 11, 12, 0.403); padding: 10px; border-radius: 10px;">
                <p style="position: relative; left:10px;color: white;">Screenshots</p>
                <div style="border-bottom: 2px solid rgba(83, 83, 83, 0.186);border-radius: 100px;"></div>
                <div class="UI-Block Screanshots">
                    <div class="Scroll">
                        <img src="MediaArchive/GamePlay/<?php echo $game_data['Scr_1']; ?>">
                        <img src="MediaArchive/GamePlay/<?php echo $game_data['Scr_2']; ?>">
                    </div>
            </div>
            </div>
            <div style="background-color: rgba(18, 11, 12, 0.403); padding: 10px; border-radius: 10px; margin-top: 10px;">
                <p style="position: relative; left:10px;color: white;">Description</p>
                <div style="border-bottom: 2px solid rgba(83, 83, 83, 0.186);border-radius: 100px;"></div>
                <div>
                    <p style="position: relative; left:10px; color:whitesmoke;"><?php echo $game_data['description']; ?></p>
                </div>
            </div>
            <div style="background-color: rgba(18, 11, 12, 0.403); padding: 10px; border-radius: 10px; margin-top: 10px;">
                <p style="position: relative; left:10px;color: white;">System Requirements
                </p>
                <div style="border-bottom: 2px solid rgba(83, 83, 83, 0.186); border-radius: 100px;"></div>
                <div style='position: relative; margin-bottom:30px;'>
                    <p style="position: relative; left:10px; color:whitesmoke;">Available on: Mobile, PC</p>
                    <p style="position: relative; left:10px; color:whitesmoke;">OS: Windows 11 or higher</p>
                    <p style="position: relative; left:10px; color:whitesmoke;">VideoKarta: RTX 5070 ULTRA</p>
                </div>
                <div style="margin-bottom: 30px;"></div>
                
            </div>
            <div class="feedbackfeed">
                <div class="feedback">
                    <input type="text" id="feedbackInput" placeholder="Write a feedback">
                    <button class="feedback-submit"><i class="fas fa-arrow-right"></i></button>
                </div>
                <div style="margin-bottom: 10px;"></div>
                <?php
                include 'System/UploadFeedBacks.php'
                
                ?>
            </div>
        </div>
    </div>
    <div style="margin-bottom:75px;"></div>
    <div class="mobile-nav">
        <a href="index.php" class="nav-item"><i class="fas fa-shopping-cart fa-lg"></i> Store</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-book-open fa-lg"></i> Library</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-cog fa-lg"></i> Settings</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="nav-item"><i class="fas fa-tools fa-lg"></i> Panel</a>
        <?php } ?>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Находим кнопку и форму
    var submitButton = document.querySelector('.feedback-submit');
    var feedbackForm = document.querySelector('.feedback');

    var lastRequestTime = 0;
    var requestLimitInterval = 2 * 60 * 1000; // Временной интервал в 2 минуты

    // Добавляем обработчик события клика на кнопку
    submitButton.addEventListener('click', function(event) {
        // Проверяем, прошло ли достаточно времени с момента последнего запроса
        var currentTime = new Date().getTime();
        if (currentTime - lastRequestTime < requestLimitInterval) {
            console.log("Слишком частые запросы. Подождите некоторое время перед отправкой нового запроса.");
            return; // Прерываем выполнение функции, если не прошло достаточно времени
        }

        // Отменяем стандартное поведение формы, чтобы страница не перезагружалась
        event.preventDefault();

        // Получаем значение из поля ввода
        var feedbackInput = feedbackForm.querySelector('#feedbackInput').value;

        // Отправляем данные на сервер с помощью AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'System/PostFeedBack.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Выводим сообщение об успешной отправке или ошибке
                console.log(xhr.responseText);
            }
        };
        xhr.send('feedbackInput=' + encodeURIComponent(feedbackInput));

        // Обновляем время последнего запроса
        lastRequestTime = currentTime;
    });
});

</script>