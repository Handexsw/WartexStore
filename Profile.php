<?php

require 'System/Global/AccountConnect.php';
require_once 'System/Global/Fragment.php';
require 'System/Global/IsPanel.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Настройки -->
    <title>Profile</title>
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
    <script src="System/JavaScript/LinksIcons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <img src="MediaArchive/System/iconsite.png"> 
        <a href="index.php" class="desktop-only">STORE</a>
        <a href="Library.php" class="desktop-only">LIBRARY</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="desktop-only">PANEL</a>
        <?php } ?>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Поиск">
        </div>
        <div>
            <a href="Profile.html">
                <div class="PROFICO">
                    <img src="https://elemsocial.com/Content/Avatars/<?php echo $Account['Avatar']; ?>">
                </div>
            </a>
        </div>
    </header>
    <div style="margin-bottom:90px;"></div>
    <div class="profilePage">
        <div class="container">
            <div class="profilePage">
                <div class="banner">
                    <img src="https://elemsocial.com/Content/Covers/<?php echo $Account['Cover']; ?>">
                </div>
                <img class="avatar" src="https://elemsocial.com/Content/Avatars/<?php echo $Account['Avatar']; ?>"
                    alt="Аватар">
                <div class="ProfileName">
                    <?php echo $Account['Name']; ?>
                <?php if (!empty($verification_array) && in_array(1, $verification_array)) { ?>
                    <i class="fa-solid fa-circle-check"></i>
                <?php } ?>
                </div>
                <div class='Description'>
                    <?php echo $Account['Description']; ?>
                </div>
<div class="parent-container">
    <?php if (isset($Account['Links']) && is_array($Account['Links'])): ?>
        <?php foreach ($Account['Links'] as $link): ?>
            <div class="custom-container">
                <a href="<?php echo $link['Link']; ?>">
                    <?php echo "<script>document.write(HandleLinkIcon('{$link['Link']}'));</script>"; ?>
                    <span class="custom-site-name"><?php echo $link['Title']; ?></span>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div style="color:white;" class="custom-container">
            None
        </div>
    <?php endif; ?>
</div>
        </div>
    </div>
    <div style="margin-top:10px;"></div>
    <div class="profilePage">
        <div class="ProfileInfo">
            <div class="containerGroup">
                <div class="containerLeft">
                    Недавно скачал
                </div>
                <div class="spacer"></div>
                <div class="containerRight">
                    Друзья
                    <div>
                        <p style="margin-top: 50px;">У тебя их нет:(</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-nav">
        <a href="index.php" class="nav-item"><i class="fas fa-shopping-cart fa-lg"></i> Store</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-book-open fa-lg"></i> Library</a>
        <a href="Library.php" class="nav-item"><i class="fas fa-cog fa-lg"></i> Settings</a>
        <?php if (!empty($PanelRay) && in_array(1, $PanelRay)) { ?>
        <a href="Panel.php" class="nav-item"><i class="fas fa-tools fa-lg"></i> Panel</a>
        <?php } ?>
    </div>
</body>
</html>