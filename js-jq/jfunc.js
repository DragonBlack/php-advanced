(function($){
    $.fn.clock = function(param){
        var time = new Date();
        var hours = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        var t;
        var elem = $(this);

        var startClock = function(e){
            e.preventDefault();

            t = setInterval(function(){
                var date = new Date();
                $('.clock-hour', $(elem)).text(date.getHours());
                $('.clock-minutes', $(elem)).text(date.getMinutes());
                $('.clock-sec', $(elem)).text(date.getSeconds());
            }, 500);
        };

        var stopClock = function(e){
            e.preventDefault();
            clearInterval(t);
        };

        var resetClock = function(e){
            e.preventDefault();
            stopClock();
        };

        var createButtonStart = function(){
            var btn = $('<button></button>');
            btn.text('Start');
            btn.on('click', startClock);
            return btn;
        };

        var createButtonStop = function(){
            var btn = $('<button></button>');
            btn.text('Stop');
            btn.on('click', stopClock);
            return btn;
        };

        var createButtonReset = function(){
            var btn = $('<button></button>');
            btn.text('Reset');
            btn.on('click', resetClock);
            return btn;
        };

        var clockContainer = $('<div/>');
        $(clockContainer).addClass('clock-view');
        var spanH = $('<span/>');
        spanH.addClass('clock-hour').text(hours);

        var spanM = $('<span/>');
        spanM.addClass('clock-minutes').text(min);

        var spanS = $('<span/>');
        spanS.addClass('clock-sec').text(sec);

        clockContainer.append(spanH);
        clockContainer.append(':');
        clockContainer.append(spanM);
        clockContainer.append(':');
        clockContainer.append(spanS);

        var buttonPanel = $('<div>');
        buttonPanel.addClass('clock-btn-panel');

        var startBtn = createButtonStart();
        buttonPanel.append(startBtn);
        buttonPanel.append(createButtonStop());
        //buttonPanel.append(createButtonReset());

        $(this).append(clockContainer).append(buttonPanel);

        if(param === 'start'){
            startBtn.click();
        }
    }
})(jQuery);