<!DOCTYPE html>
<html>
<head></head>
<script type="text/javascript">
    function loadPhones() {
        // 1. Создаём новый объект XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // 2. Конфигурируем его: GET-запрос на URL 'phones.json'
        xhr.open('GET', 'phones.json', false);

        // 3. Отсылаем запрос
        xhr.send();

        // 4. Если код ответа сервера не 200, то это ошибка
        if (xhr.status != 200) {
            // обработать ошибку
            alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
        } else {
            // вывести результат
            alert(xhr.responseText); // responseText -- текст ответа.
        }
    }

    function loadPhonesAsync(){
        var button = document.getElementById('btn');
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'phones.json', true);

        xhr.send(); // (1)

        xhr.onreadystatechange = function() { // (3)
            console.log(xhr.readyState);
            if (xhr.readyState != 4) return;

            button.innerHTML = 'Готово!';
            button.disabled = false;

            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);
            } else {
                alert(xhr.responseText);
            }

        }

        button.innerHTML = 'Загружаю...'; // (2)
        button.disabled = true;
    }
</script>
<body>
<button id="btn" onclick="loadPhonesAsync(this)">Загрузить phones.json!</button>
</body>
</html>