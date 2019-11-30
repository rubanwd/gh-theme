$(".video-single-page").hover(function () {

        $(this).addClass("video-tall");

        }, function () {
        $(this).removeClass("video-tall");
        });



    // $.fn.scrollView = function () {
    //   return this.each(function () {
    //     $('html, body').animate({
    //       scrollTop: $(this).offset().top
    //     }, 2000);
    //   });
    // }


    $('#arrow-bottom-single').click(function (event) {
      event.preventDefault();

      document.body.scrollTop = 500;
      document.documentElement.scrollTop = 500;

      $('.video-single-page').removeClass("video-tall");
      
      // $('.video-single-page').css('height', '300px');
      // // $('.video-single-page').addClass("video-tall");

      // // $('.video-single-page').addClass("video-tall");
      // // $('#spg').scrollView();

    });


    window.onscroll = function() {stickyShareFunction()};
    window.onload = function() {stickyShareFunction()};

    function stickyShareFunction() {
      if (window.pageYOffset > 200) {
        $(".crunchify-social-bottom").slideDown();
      } else {
        $(".crunchify-social-bottom").slideUp();
      }
    }