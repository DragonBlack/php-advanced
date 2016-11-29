$(document).ready(function(){
    var ws;
    var chatActive=false;
    $('#connect button').on('click', function(){
        var nick = $('#connect input').val();
        if($.trim(nick) == ''){
            alert('Выберите себе nickname');
            return;
        }

        if(chatActive){
            return;
        }
        ws = new WebSocket('ws://192.168.1.21:8004');
        ws.onopen = function(){
            $('.chatroom').append('<div>Вы вошли в чат</div>');
            ws.send('/sign '+nick);
            $('#connect').hide();
            chatActive = true;
        }
        ws.onmessage = function(event){
            $('.chatroom').append('<div>'+event.data+'</div>');
        }
        ws.onclose = function(event){
            if(event.wasClean){
                $('.chatroom').append('<div>Вы покинули в чат</div>');
            }
            else{
                $('.chatroom').append('<div>Обрыв соединения</div>');
            }
            chatActive = false;
            $('#connect').show();
        }
    });

    $('#send').on('click', function(){
        var msg = $('#msg').val();
        if($.trim(msg) !== ''){
            ws.send(msg);
            $('#msg').val('');
        }
    })
});

