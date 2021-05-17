<script>
    $(function() {
        $('nav').fadeIn(1000);
        $("nav").hide();
        $(".hg_menu").click(function() {
            $("nav").toggle(400);
            
        });
    });
    
            $(".nav_sub_new").hide();
            $(".nav_main_new").click(function() {
                $(".nav_sub_new").slideToggle(300);
            });
            
            $(".nav_sub_sale").hide();
            $(".nav_main_sale").click(function() {
                $(".nav_sub_sale").slideToggle(300);
            });
            
            $(".nav_sub_men").hide();
            $(".nav_main_men").click(function() {
                $(".nav_sub_men").slideToggle(300);
            });
            
            $(".nav_sub_women").hide();
            $(".nav_main_women").click(function() {
                $(".nav_sub_women").slideToggle(300);
            });
            
    $(function() {
        $(".cart_action").hide();
        $(".cart_png").mouseover(function() {
            $(".cart_action").slideToggle(500);
        });
        $(".cart_close_btn").click(function() {
            $(".cart_action").slideToggle(500);
        });
    });
</script>