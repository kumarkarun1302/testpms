/*
Template: ANJ PMS - Landing Page
Author: ANJ Webtech Pvt Ltd
Version: 1.0
Design and Developed by: ANJ Webtech Pvt Ltd
*/
/*----------------------------------------------
Index Of Script
------------------------------------------------
 1 Page Loader
 2 Back To Top
 3 Tooltip
 4 Hide Menu
 5 Accordion
 6 Header
 7 About Menu
 8 Magnific Popup
 9 Countdown
10 Progress Bar
11 widget
12 counter
13 Wow Animation
14 Owl Carousel
15 Contact From
16 On Scroll
17 Cookie
------------------------------------------------
Index Of Script
----------------------------------------------*/



    "use strict";
    $(document).ready(function() {



        /*------------------------
        Page Loader
        --------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay(0).fadeOut("slow");



        /*------------------------
        Back To Top
        --------------------------*/
        $('#back-to-top').fadeOut();
        $(window).on("scroll", function() {
            if ($(this).scrollTop() > 250) {
                $('#back-to-top').fadeIn(1400);
            } else {
                $('#back-to-top').fadeOut(400);
            }
        });
        // scroll body to 0px on click
        $('#top').on('click', function() {
            $('top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });



      



        /*------------------------
        Hide Menu
        --------------------------*/
        $(".navbar a").on("click", function(event) {
            if (!$(event.target).closest(".nav-item.dropdown").length) {
                $(".navbar-collapse").collapse('hide');
            }
        });



        



        /*------------------------
        Header
        --------------------------*/
        $('.navbar-nav li a').on('click', function(e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top - 0
            }, 1500);
            e.preventDefault();
        });
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                $('header').addClass('menu-sticky');
            } else {
                $('header').removeClass('menu-sticky');
            }
        });



        

        /*------------------------
        4 slick
        --------------------------*/
        $('.variable-width').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 2,
      centerMode: true,
      variableWidth: true,
      autoPlay:true,
      responsive: [{

            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
        }
        }]

    });


    /*--------------------------
    bootstrap menu index-12
    ---------------------------*/

    if($("#scene").length){
            var scene = document.getElementById('scene');

            var parallaxInstance = new Parallax(scene);
             }

        /*------------------------
        counter
        --------------------------*/
        $('.timer').countTo();



        /*------------------------
        Wow Animation
        --------------------------*/
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();



        /*------------------------
        Owl Carousel
        --------------------------*/
        $('.owl-carousel').each(function() {
            var $carousel = $(this);
            $carousel.owlCarousel({
                items: $carousel.data("items"),
                loop: $carousel.data("loop"),
                margin: $carousel.data("margin"),
                nav: $carousel.data("nav"),
                dots: $carousel.data("dots"),
                autoplay: $carousel.data("autoplay"),
                autoplayTimeout: $carousel.data("autoplay-timeout"),
                navText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'],
                responsiveClass: true,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: $carousel.data("items-mobile-sm")
                    },
                    // breakpoint from 480 up
                    480: {
                        items: $carousel.data("items-mobile")
                    },
                    // breakpoint from 786 up
                    786: {
                        items: $carousel.data("items-tab")
                    },
                    // breakpoint from 1023 up
                    1023: {
                        items: $carousel.data("items-laptop")
                    },
                    1199: {
                        items: $carousel.data("items")
                    }
                }
            });
        });

        $("#sw-1").click(function() {
            if($(this).is(":checked")){
                $('.opt-1').css('display','none');
                $('.opt-2').css('display','inline-block');
            }else{
                $('.opt-2').css('display','none');
                $('.opt-1').css('display','inline-block');
            }
        });

        /*========================
    03: Background Image
    ==========================*/
    var $bgImg = $('[data-bg-img]');
    $bgImg.css('background-image', function () {
        return 'url("' + $(this).data('bg-img') + '")';
    }).removeAttr('data-bg-img').addClass('bg-img');

    //===== 15. Scroll Event
    $(window).on('scroll', function() {
        var scrolled = $(window).scrollTop();
        if (scrolled > 300) $('.go-top').addClass('active');
        if (scrolled < 300) $('.go-top').removeClass('active');
    });
    $('.go-top').on('click', function() {
        $('html, body').animate(
            {
                scrollTop: '0'
            },
            1200
        );
    });
});
       


  

    



   

   


 
