<?php get_header('static'); ?>  
 <!-- Font-awesome -->


    
    <div class="single-page">

        
        
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="single-page-arrows">
            
                    <?php  
                                        
                        /**
                         *  Infinite next and previous post looping
                         */
                        if( get_adjacent_post(false, '', true) ) { 
                            previous_post_link('%link', '<i class="fa fa-angle-left"></i> ' );
                        } else { 
                            $args = array(
                                        'post_type' => 'products',
                                        'posts_per_page' => 1,
                                        'order'          => 'DESC'
                                    );
                                    $first = new WP_Query( $args ); $first->the_post();
                                    echo '<a href="' . get_permalink() . '"><i class="fa fa-angle-left"></i></a>';
                                    wp_reset_query();
                        }; 
                            
                        if( get_adjacent_post(false, '', false) ) { 
                            next_post_link('%link', '<i class="fa fa-angle-right"></i>');
                        } else { 
                            $args = array(
                                        'post_type' => 'products',
                                        'posts_per_page' => 1,
                                        'order'          => 'ASC'
                                    );
                                    $last = new WP_Query( $args ); $last->the_post();
                                    echo '<a href="' . get_permalink() . '"><i class="fa fa-angle-right"></i></a>';
                                    wp_reset_query();
                        }; 

                    ?>

                </div>

            <div class="product-single-title">

                <?php 
                    $imgURL_5 = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'gif-img');
                ?>

                <div class="video-single-page" style="background-image: url(<?php echo $imgURL_5 ?>);background-repeat: no-repeat;background-position: center;background-size: cover;">
                <div class="single-video-transparent"></div>

                <h1><?php echo get_post_meta($post->ID, 'title', true);  ?></h1>

                <span id="arrow-bottom-single" class="arrow-bottom arrow-bottom-single"><img src="http://1157828.ethirka.web.hosting-test.net/gh/wp-content/uploads/2018/10/giphy.gif" alt="arrow-bottom"></span>

                <span class="click-me">
                    <img src="http://1157828.ethirka.web.hosting-test.net/gh/wp-content/uploads/2018/10/click-me.png" alt="click-me">
                </span>



                

            </div>




            <div class="single-product-content" id="spg">
                






                

                        <div class="">
                            <?php the_post_thumbnail('small', ['class' => 'product-image', 'title' => 'Feature image']); ?>
                        </div>

                        <div class="single-product-content__text">



    
                                <h1><?php the_title() ?></h1>
                                <p class="prod-text"><?php the_content(); ?></p>

                                <div class="single-actions">
                                    <a rel="nofollow" href="<?php echo get_post_meta($post->ID, 'place', true);  ?>" class="target-button">Learn More</a>

                                    <div class="like-button">
                                        <span class="like-this">I like this </span>
                                        <?php echo getPostLikeLink(get_the_ID());?>
                                    </div>

                                    
                                </div>



                                


                                
  

                        </div>

                        <?php comments_template( '/comments.php' ); ?> 

                    </div>  

                <?php endwhile; ?>

                    <?php else: ?>
                        
                    <?php endif; ?>



                



            </div>


    </div>

        
<?php get_footer(); ?>  

<script>


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


    


</script>


