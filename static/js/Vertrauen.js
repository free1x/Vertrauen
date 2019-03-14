$(document).ready(function(){
    let backTop = $('.backTop');
    backTop.hide();
    $(function () {
        $(window).scroll(function(){
            if ($(window).scrollTop()>100){
                backTop.fadeIn(300);
            }
            else
            {
                backTop.fadeOut(300);
            }
        });
        backTop.click(function(){
            $('body,html').animate({scrollTop:0},1200);
            return false;
        });
    });
});