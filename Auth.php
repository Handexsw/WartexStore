<?php

require 'System/Global/AccountConnect.php';
require 'System/Global/IsPanel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Настройки -->
    <title>Auth</title>
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
    <style>

a {
    text-decoration: none;
    color: #AAA;
}

button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: fit-content;
    padding: 10px 20px;
    margin: 180px auto;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #5050e3;
    color: #fff;
    cursor: pointer;
    display: block;
}


button:hover {
    background-color: #45a049;
}


.indexss img {
    max-width: 100%;
    height: auto;
}

.info {
    color: #fff;
    text-align: center;
    max-width: 600px;
    margin: 0 auto 10px;
}
.indexss {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 100%;
    max-width: 600px;
}


    </style>
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
    <div class='indexss'>
        <img src="MediaArchive/System/ElementXWartex.jpg">
        <div class="info">В WartexStore невозможно зарегистрировать аккаунт, однако вы можете создать учетную запись в
            Element и войти через нее! Почему мы приняли такое решение? Мы делаем ставку на безопасность аккаунтов и
            более развитую систему контроля.</div>
    </div>
    <a href="https://elemsocial.com/app_connect?AppID=6d35b84f59ccef6a5ce217ce5b10308cf9ce5aa60b9d6207a6f12b5e196c2c56">
        <button>
            Подключить
        </button>
    </a>
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
