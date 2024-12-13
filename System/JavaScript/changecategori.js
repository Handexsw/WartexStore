document.addEventListener("DOMContentLoaded", function() {
    var button1 = document.getElementById('button1');
    var button2 = document.getElementById('button2');
    var text1 = document.getElementById('text1');
    var text2 = document.getElementById('text2');
    var text3 = document.getElementById('text3');
    var isLoading = false;

    // Функция для загрузки контента
    function loadContent(url, container) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                isLoading = false;
                if (xhr.status == 200) {
                    container.innerHTML = xhr.responseText;
                    container.style.display = 'block';
                } else {
                    console.error('Произошла ошибка при загрузке данных');
                }
            }
        };
        xhr.send();
    }

    // Загрузка контента при загрузке страницы
    window.onload = function() {
        if (!isLoading) {
            isLoading = true;
            loadContent('System/LoadGame.php', text1);
            loadContent('System/LoadGame.php', text2);
            loadContent('System/LoadGame.php', text3);
        }
    };

    // Обработчики событий для кнопок
    button1.addEventListener('click', function() {
        if (!isLoading && !button1.classList.contains('active-tab')) {
            isLoading = true;
            // Добавление класса active-tab для кнопки 1
            button1.classList.add('active-tab');
            // Удаление класса active-tab у кнопки 2
            button2.classList.remove('active-tab');
            loadContent('System/LoadGame.php', text1);
            loadContent('System/LoadGame.php', text2);
            loadContent('System/LoadGame.php', text3);
        }
    });

    button2.addEventListener('click', function() {
        if (!isLoading && !button2.classList.contains('active-tab')) {
            isLoading = true;
            // Добавление класса active-tab для кнопки 2
            button2.classList.add('active-tab');
            // Удаление класса active-tab у кнопки 1
            button1.classList.remove('active-tab');
            loadContent('System/LoadApp.php', text1);
            loadContent('System/LoadApp.php', text2);
            loadContent('System/LoadApp.php', text3);
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
            // Отправляем AJAX-запрос к LoadGame.php
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'System/LoadGame.php', true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Успешно получен ответ от LoadGame.php
                } else {
                    // Обработка ошибок
                    console.error('Ошибка при выполнении запроса к LoadGame.php');
                }
            };
            xhr.onerror = function() {
                // Обработка ошибок сети
                console.error('Ошибка сети при выполнении запроса к LoadGame.php');
            };
            xhr.send();
        });
document.addEventListener("DOMContentLoaded", function() {
    const downloadButtons = document.querySelectorAll('.draggable-button');
    
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const gameId = this.getAttribute('data-game-id');
            
            // Отправляем AJAX-запрос для увеличения счетчика загрузок
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'increment_download_count.php?id=' + gameId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Счетчик загрузок обновлен');
                } else {
                    console.error('Произошла ошибка при обновлении счетчика загрузок');
                }
            };
            xhr.send();
        });
    });
});
