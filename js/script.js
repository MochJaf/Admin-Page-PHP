$(window).scroll(function() {
    var Wscroll = $(this).scrollTop();

    //fitur
    if(Wscroll > $('.fitur').offset().top -200) {
        $('.fitur .thumbnail').each(function(i) {
            setTimeout(function() {
                $('.fitur .thumbnail').eq(i).addClass('show');
            }, 400 * (i+1));
        });
    }
});