$(document).ready(function() {

    



    $(".mobile_menu_button").click(function() {
        $(".mobile-main-nav").fadeIn();
    });

    $(".close_main-nav").click(function() {
        $(".mobile-main-nav").fadeOut();
    });

    $(".mobile-main-nav ul li a").click(function() {
        $(".mobile-main-nav").fadeOut();
    });

    $("#search-button").click(function() {
        $(".search-field").fadeIn();
        $("#s").focus();
    });

    $(".close_search-field").click(function() {
        $(".search-field").fadeOut();
    });


    document.getElementById("s").placeholder = "Search for...";


    $(".slider-games").slick({

        prevArrow: '.controllers-slider-games .prev',
        nextArrow: '.controllers-slider-games .next',
            
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,

        responsive: [
            {
            breakpoint: 1100,
            settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                    }
            },
            {
            breakpoint: 700,
            settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
            }

        ]
    });


    $(".slider-soft").slick({

        prevArrow: '.controllers-slider-soft .prev',
        nextArrow: '.controllers-slider-soft .next',
            
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,

        responsive: [
            {
            breakpoint: 1100,
            settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                    }
            },
            {
            breakpoint: 700,
            settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
            }

        ]
    });











    // var pathname = window.location.pathname;

    // console.log(pathname);

    // if (pathname == "/about/" || pathname == "/about/our-team/") {
    //     $(".menu-item-173").addClass("menu-active");
    // }
    // if (pathname == "/blog/") {
    //     $(".menu-item-175").addClass("menu-active");
    // }
    // if (pathname == "/contact/") {
    //     $(".menu-item-29").addClass("menu-active");
    // }


$('.slide').slide({
    
    'isShowArrow': true,
    'dotsEvent': 'mouseenter',
    'isLoadAllImgs': true
});


$(".product-item").hover(function(){
        $(this).find('.video-hover').fadeIn();
        }, function(){
        $(this).find('.video-hover').fadeOut();
    });


// $(".product-cat-item").hover(function(){
//         $(this).find('.video-hover__cat').fadeIn();
//         console.log('messagecddcdcdcdcdcd');
//         }, function(){
//         $(this).find('.video-hover__cat').fadeOut();

//     });


// $(".project-item").hover(function(){
//         var src = $(this).find('.project-image').attr("src");
//         $(this).find('.project-image').attr("src", src.replace(/\.jpg$/i, ".gif"));
//         },
//         function()
//         {
//           var src = $(this).find('.project-image').attr("src");
//           $(this).find('.project-image').attr("src", src.replace(/\.gif$/i, ".jpg"));
//         });





$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();

    // Show/hide menu on scroll
    //if (scrollDistance >= 850) {
    //    $('nav').fadeIn("fast");
    //} else {
    //    $('nav').fadeOut("fast");
    //}
  
    // Assign active class to nav links while scolling
    $('.page-section').each(function(i) {
        if ($(this).position().top <= scrollDistance) {
            $('.main-nav li.current_page_item').removeClass('current_page_item');
            $('.main-nav li').eq(i).addClass('current_page_item');
        }
    });
}).scroll();

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();

    // Show/hide menu on scroll
    //if (scrollDistance >= 850) {
    //    $('nav').fadeIn("fast");
    //} else {
    //    $('nav').fadeOut("fast");
    //}
  
    // Assign active class to nav links while scolling
    $('.page-section').each(function(i) {
        if ($(this).position().top <= scrollDistance) {
            $('.mobile-main-nav li.current_page_item').removeClass('current_page_item');
            $('.mobile-main-nav li').eq(i).addClass('current_page_item');
        }
    });
}).scroll();

if ($("#textareaofform")) {
    
    $("#textareaofform").attr("placeholder", "Your Message");
}
    

});

