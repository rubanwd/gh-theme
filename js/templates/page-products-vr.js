window.onscroll = function() {stickyHeaderFunction()};
    window.onload = function() {stickyHeaderFunction()};

    var header = document.getElementById("pgb-header");

    function stickyHeaderFunction() {
      if (window.pageYOffset > 100) {
        $(".pgb-sidebar").css('padding-top','50px');
        $(".sidebar-top-widget").fadeIn();
      } else {
        $(".pgb-sidebar").css('padding-top','150px');
        $(".sidebar-top-widget").fadeOut();
      }
    }

    $("#search-widget").click(function() {
        $(".search-field").fadeIn();
        $("#s").focus();
    });

    $(".widget_menu_button").click(function() {
        $(".mobile-main-nav").fadeIn();
    });




    $("#loadMoreHardware").on('click', function(e) {
        //inite

        e.preventDefault();
        var that = $(this);
        var page = $(this).data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        //ajax call
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                page: page,
                action: 'ajax_script_load_more_hardware'
 
            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                //check
                if (response == 0) {
                    $('#ajax-content').append('<div class="text-center"><h3>You reached the end of the line!</h3><p>No more posts to load.</p></div>');
                    $('#loadMoreHardware').hide();
                } else {
                    that.data('page', newPage);
                    $('#ajax-content').append(response);
                }
            }
        });
    });