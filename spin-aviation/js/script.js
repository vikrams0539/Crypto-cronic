$(document).ready(function(){
    $(".topButton>a").on("click",function(e){
        $(window).on("scroll", function(){
            if($(window).scrollTop() > 100)
            {
                $(this).attr("disabled","disabled");
            }
            else
            {
                $(this).attr("disabled","disabled");
            }

        })
        $("body").find("#dropline").animate({top : '100px'}, 1000);
        // $("body").find("#dropline").css({"margin-top":"100px"})
    })

    if($(window).width() < 767 )
    {
        $(window).on("scroll", function(){

            let scroll_top = $(window).scrollTop();
                if(scroll_top > 750 ){
                    $(".mobile_btn").fadeIn();
                }
                else{
                    
                    $(".mobile_btn").fadeOut();
                }
        })
    }
})