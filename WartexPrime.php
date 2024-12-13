<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WartexPrime Премиум Подписка</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="dark-theme">
    <header>
        <h1>WartexPrime Премиум Подписка</h1>
    </header>
    <main>
        <section class="benefits">
            <h2>Преимущества подписки:</h2>
            <div class="benefits-container">
                <ul>
                    <li>Эксклюзивные скины и предметы в игре</li>
                    <li>Дополнительные бонусы и возможности</li>
                    <li>Приоритетная поддержка от команды разработчиков</li>
                </ul>
            </div>
        </section>
        <section class="subscription-details">
            <h2>Детали подписки:</h2>
            <p>Единственный тариф: ежемесячная подписка за 20 рублей.</p>
        </section>
        <div class="actions">
            <button class="buy-button">Купить</button>
            <button class="activate-button">Активировать</button>
        </div>
    </main>
</body>
</html>
<style>
    body.dark-theme {
    background-color: #000;
    color: #fff;
    font-family: 'Roboto', sans-serif;
}

header {
    background-color: #000;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 32px;
    font-weight: bold;
}

main {
    padding: 20px;
}

.benefits {
    margin-bottom: 30px;
}

.benefits h2 {
    margin-top: 0;
}

.benefits-container {
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
}

.benefits ul {
    list-style-type: none;
    padding: 0;
}

.benefits li {
    margin-bottom: 10px;
}

.subscription-details h2 {
    margin-top: 0;
}

.actions {
    text-align: center;
    margin-top: 20px;
}

.buy-button, .activate-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 10px;
}

.buy-button:hover, .activate-button:hover {
    background-color: #0056b3;
}

</style>