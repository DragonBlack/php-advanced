(function($){
    $.fn.clock = function(){
        var time = new Date();
        var hours = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();

        $(this).each(function(i, k){
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

            $(k).append(clockContainer).append(buttonPanel);
        });


    }
})(jQuery);