(function ($) {

    "use strict";
    var loop = 0;
    window.AscreateSlider = {

        init: function () {
            this.sliderImg();
        },

        sliderImg: function () {
            var td = this.totalSlides();
            var id = $(".slider-box").attr("data-load");
            if (id == td) {
                id = 1;
            } else {
                id++;
            }

            if (loop == 0) {
                this.sliderNavbtn(id, td);
                loop++;
            }
            this.activeSlideNav(id);
            this.looppost(id)
            setTimeout(function () {
                this.sliderImg();
            }, 8000);
        },

        totalSlides: function () {
            var td = 0;
            $(".slider-data").each(function () {
                td++;
            });
            return td;
        },

        sliderNavbtn: function (id, td) {
            $(".view-position").html("");
            var margin = 100 / td;
            td++;
            for (var i = 1; i < td; i++) {
                var dataimg = '<img class="pagepoint pagepoint' + i + '" data-id="' + i + '" src="./wp-content/themes/AScreative/images/';
                if (id == i) {
                    dataimg += 'slider-active.png';
                } else {
                    dataimg += 'slider-unactive.png';
                }
                dataimg += '" style="margin-top: ' + margin + 'px;"/>';

                $(".view-position").append(dataimg);
            }
        },

        activeSlideNav: function (id) {
            $(".pagepoint").attr("src", "./wp-content/themes/AScreative/images/slider-unactive.png");
            $(".pagepoint" + id).attr("src", "./wp-content/themes/AScreative/images/slider-active.png");
        },

        loadthis: function (id) {
            $(".pagepoint").on("click", function () {
                var id = $(this).attr("data-id");
                var td = this.totalSlides();
                this.activeSlideNav(id);
                this.looppost(id);
            });

        },

        looppost: function (id) {
            $(".slider-box").attr("data-load", id);
            var img = $(".slider-data" + id).attr("data-img");
            $(".slider-data").css('display', 'none');
            $(".slider-data" + id).css('display', 'block');
            $(".slider-box").attr('style', 'background-image: url(' + img + ');');
        },

        nextSlide: function () {


            $(".slider-next").on("click", function () {
                var td = this.totalSlides();
                var id = $(".slider-box").attr("data-load");
                if (id == td) {
                    id = 1;
                } else {
                    id++;
                }
                this.activeSlideNav(id);
                this.looppost(id);
            });
        },

        prevSlide: function () {

            $(".slider-prev").on("click", function () {
                var td = this.totalSlides();
                var id = $(".slider-box").attr("data-load");
                if (id == 1) {
                    id = td;
                } else {
                    id--;
                }
                this.activeSlideNav(id);
                this.looppost(id);
            });

        }


    }
    window.Ascreate = {
        postchiled: function () {

            $(".child-post").on("onmouseover", function () {
                var id = $(this).attr("data-pid");
                var mainid = $(this).attr("data-id");
                $('.pages-title').removeClass("page-active");
                $(id).addClass("page-active");
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
        AscreateSlider.init();
    });
})(jQuery)