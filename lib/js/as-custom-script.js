(function ($) {

    "use strict";
   
    window.Ascreate = {
    		
        postchiled: function () {

            $(".child-post").on("mouseover", function () {
            	var mainid = $(this).attr("data-id");
                $('.pages-title').removeClass("page-active");
                $(this).addClass("page-active");
                $('.allchild').css('display', 'none');
                $('.childpage' + mainid).css('display', 'block');
            });

            $(".navbar-toggle").click(function() {
                $( "#cssmenu" ).toggle('down');
            });
            $(window).scroll(function(){
                var windowwidth= window.innerWidth;
                if(windowwidth<=800){
                    $( "#cssmenu" ).hide('down');
                }
            });
        }


    }
        $(document).ready(function () {
        	Ascreate.postchiled();
    });
})(jQuery)
