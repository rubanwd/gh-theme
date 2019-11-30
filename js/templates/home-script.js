$(document).ready(function() {
    window.onscroll = function() {stickyHeaderFunction()};
    window.onload = function() {stickyHeaderFunction()};
    var header = document.getElementById("pgb-header");
    function stickyHeaderFunction() {
      if (window.pageYOffset > 100) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
    $('a[href^="#"]').bind('click', function(e) {
        e.preventDefault(); // prevent hard jump, the default behavior
        var target = $(this).attr("href"); // Set the target as variable
        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 200, function() {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });
        return false;
    });
    setTimeout(function(){ $('.title-slug h1').fadeIn(3000); }, 2000);
	$("video").prop('muted', true);
});
    