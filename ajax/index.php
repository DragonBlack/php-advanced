<!DOCTYPE html>
<html>
<head></head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    function loadPhones() {
        // 1. Создаём новый объект XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // 2. Конфигурируем его: GET-запрос на URL 'phones.json'
        xhr.open('GET', 'HightFile.7z', false);

        var t = setInterval(function(){var time=new Date();console.log(time.getSeconds());}, 500);
        // 3. Отсылаем запрос
        xhr.send();

        // 4. Если код ответа сервера не 200, то это ошибка
        if (xhr.status != 200) {
            // обработать ошибку
            alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
        } else {
            // вывести результат
            console.log(xhr); // responseText -- текст ответа.
        }
    }

    function loadPhonesAsync(){
        var button = document.getElementById('btn');
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'http://google.ru', true);


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

        console.log(xhr);

        button.innerHTML = 'Загружаю...'; // (2)
        button.disabled = true;
    }

    function jQAjax(url){
        $.ajax({
            url: url,
            dataType: 'jsonp',
            success: function(response){
                console.log(response.query.results);
            },
            error: function (a, b) {
                console.log('Error');
            },
            complete: function(a, b){
                //console.log(a, b);
            }
        });
    }
</script>
<body>
<button id="btn" onclick="jQAjax('http://yandex.ru')">Загрузить phones.json!</button>
</body>
</html>