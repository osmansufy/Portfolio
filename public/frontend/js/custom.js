//====================================================================================

//    Template Name: Yours - Personal Portfolio HTML Template
//    Version: 1.0.0
//    Author: themeORIO
//    Email: webdesignsk0@gmail.com
//    Developed By: ThemeORIO
//    First Release: 02 August 2019
//    Author URL: https://themeforest.net/user/themeorio

//=====================================================================================

// 01.   Preloader
// 02.   Navbar Scroll
// 03.   Another Scroll js
// 04.   Sticky Navbar
// 05.   Scrollspy js
// 06.   Skill Progress Bar
// 07.   Mixitup Portfolio js
// 08.   Magnific Poppup js
// 09.   Stellar Parallax js
// 10.   Fact Counter For Achivement Counting
// 11.   CounterUp Fan Fact Area
// 12.   When document is Scrollig

//=====================================================================================

(function($)
{
    "use strict";

    var $body = $("body"),
        $window = $(window);

    /* ========================================================================
      // 01.    Preloader Active Js
       ===================================================================== */
    setTimeout(function()
    {
        $('#status').fadeOut();
        $('#preloader').delay(150).fadeOut('slow');
    }, 10000);


    /* ========================================================================
      // 02.    Navbar Scroll
       ===================================================================== */
    $(".main-menu ul li a").on("click", function(e)
    {
        if (this.hash !== "")
        {
            e.preventDefault();

            const hash = this.hash;
            $("html, body").animate(
                {
                    scrollTop : $(hash).offset().top
                },
                800
            );
        }
    });


    /*=====================================================================
        // 03.   Another Scroll js
        =======================================================================*/

    $('.navbar-nav a').on('click', function(event)
    {
        var $anchor = $(this);
        $('html, body').stop().animate(
        {
            scrollTop : $($anchor.attr('href')).offset().top - 0
        }, 1500, 'easeInOutQuad');
        event.preventDefault();
    });


    /*=========================================================================
      // 04.    Sticky Navbar
      ===========================================================================*/
    $(window).on('scroll', function()
    {
        var scroll = $(window).scrollTop();

        if (scroll >= 50)
        {
            $(".sticky").addClass("stickyadd");
        }
        else
        {
            $(".sticky").removeClass("stickyadd");
        }
    });


    /*=====================================================================
        // 05.    Scrollspy js
        =======================================================================*/
    $(".navbar-nav").scrollspy(
    {
        offset : 20
    });


    /*=====================================================================
    // 06.    Skill Progress Bar
    =======================================================================*/

    $("#bar1").barfiller(
    {
        barColor : "#990000,duration:20000"
    });
    $("#bar2").barfiller(
    {
        barColor : "#990000,duration:20000"
    });
    $("#bar3").barfiller(
    {
        barColor : "#990000,duration:10000"
    });
    $("#bar4").barfiller(
    {
        barColor : "#990000,duration:15000"
    });
    $("#bar5").barfiller(
    {
        barColor : "#990000,duration:700"
    });
    $("#bar6").barfiller(
    {
        barColor : "#990000,duration:1000000"
    });


    /*=====================================================================
      // 07.    MixitUp Portfolio js
      =======================================================================*/
    var mixer = mixitup(".portfolio-content");
    animation :
    {
        duration : 4;
    }


    /*=====================================================================
    // 08.    Magnific Poppup js
    =======================================================================*/
    $(".image-link").magnificPopup(
    {
        type : "image",
        closeOnContentClick : true,
        mainClass : "mfp-fade",
        gallery :
        {
            enabled : true,
            navigateByImgClick : true,
            preload : [0, 1]
        }
    });


    /*=====================================================================
    // 09.   Stellar Parallax js
    =======================================================================*/
    $.stellar();


    //=====================================================================================
    // 10.    Fact Counter For Achivement Counting
    //=====================================================================================

    function factCounter()
    {
        if ($(".fact-counter").length)
        {
            $(".fact-counter .count.animated").each(function()
            {
                var $t = $(this),
                    n = $t.find(".count-num").attr("data-stop"),
                    r = parseInt($t.find(".count-num").attr("data-speed"), 10);

                if (!$t.hasClass("counted"))
                {
                    $t.addClass("counted");
                    $(
                    {
                        countNum : $t.find(".count-text").text()
                    }).animate(
                    {
                        countNum : n
                    },
                    {
                        duration : r,
                        easing : "linear",
                        step : function()
                        {
                            $t.find(".count-num").text(Math.floor(this.countNum));
                        },
                        complete : function()
                        {
                            $t.find(".count-num").text(this.countNum);
                        }
                    });
                }

                //set skill building height

                var size = $(this)
                    .children(".fill")
                    .attr("aria-valuenow");
                $(this)
                    .children(".fill")
                    .css("width", size + "%");
            });
        }
    }


    /*===========================================================================
      // 11.   CounterUp Fan Fact Area
    ============================================================================*/

    $('.counter').counterUp(
    {
        delay : 10,
        time : 2000
    });


    //=====================================================================================
    // 12.    When document is Scrollig
    //=====================================================================================

    $window.on("scroll", function()
    {
        factCounter();
    });


})(jQuery);
