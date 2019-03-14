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

$(document).ready(function() {
    $.fn.postLike = function() {
        if ($(this).hasClass('done')) {
            return false;
        } else {
            $(this).addClass('done');
            var id = $(this).data("id"),
                action = $(this).data('action'),
                rateHolder = $('.post_like_count>i>b');
            var ajax_data = {
                action: "Vertrauen_like",
                um_id: id,
                um_action: action
            };
            $.post("./wp-admin/admin-ajax.php", ajax_data,
                function(data) {
                    $(rateHolder).html(data);
                });
            return false;
        }
    };
    $(document).on("click", ".favorite",
        function() {
            $(this).postLike();
        });
});


