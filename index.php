<?php

require 'System/Global/AccountConnect.php';
require 'System/Global/IsPanel.php';

?>
<!DOCTYPE html>
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
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Скрипты -->
    <script src="System/JavaScript/index.js"></script>
    <script src="System/JavaScript/changecategori.js"></script>
</head>
</body class="m-0 p-0 font-raleway font-semibold bg-[#1e1d1e] transition-colors duration-500 ease-in-out">
    <header>
        <img src="MediaArchive/System/iconsite.png">
        <a href="index.php" class="active desktop-only">STORE</a>
        <a href="Library.php" class="desktop-only">LIBRARY</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="desktop-only">PANEL</a>
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
        <products>
        <div class="news-container">
            <button class="NewsButton" onclick="prevImage()"><i class="fa-solid fa-angle-left"></i></i></button>
            <img id="mainImage" src="MediaArchive/Antivirus.jpg" alt="Image 1">
            <button class="News2Button" onclick="nextImage()"><i class="fa-solid fa-angle-right"></i></button>
        </div>
        <div class="custom-tabs custom-b-first">
            <button id="button1" class="custom-tab active-tab">Games</button>
            <button id="button2" class="custom-tab">Apps</button>
        </div>
        <appgroup1>
        </appgroup1>
        <h2>Recommended</h2>
        <appgroup2>
        <div id="text1">
        </div>
        </appgroup2>
        <h2>Others</h2>
        <appgroup3>
        <div id="text2">
        </div>
        </appgroup3>
        <h2>Useful</h2>
        <appgroup4>
        <div id="text3">
        </div>
        </appgroup4>
    </products>
    <div style="margin-bottom:75px;"></div>
    <div class="mobile-nav">
        <a href="index.php" class="nav-item active"><i class="fas fa-shopping-cart fa-lg"></i> Store</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-book-open fa-lg"></i> Library</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-cog fa-lg"></i> Settings</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="nav-item"><i class="fas fa-tools fa-lg"></i> Panel</a>
        <?php } ?>
    </div>
</body>
</html>
