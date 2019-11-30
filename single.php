<?php get_header('static'); ?>  
<div class="single-page">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        
        <div class="product-single-title">
            <div class="title-posts-single-page">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
        <div class="single-product-content" id="spg">
            <div class="img-single-post">
                <?php the_post_thumbnail('small', ['class' => 'product-image', 'title' => 'Feature image']); ?>
            </div>
            <div class="single-post-content__text">
                <article class="prod-text"><?php the_content(); ?></article>
                <div class="single-page-arrows">
                    <?php            
                        /**
                         *  Infinite next and previous post looping
                         */
                        if( get_adjacent_post(true, '', true) ) { 
                            previous_post_link('%link', '<i class="fa fa-angle-left"></i><span>Previous Post</span> ' );
                        } else { 
                            $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 1,
                                        'order'          => 'DESC'
                                    );
                                    $first = new WP_Query( $args ); $first->the_post();
                                    echo '<a href="' . get_permalink() . '"><i class="fa fa-angle-left"></i><span>Previous Post</span></a>';
                                    wp_reset_query();
                        }; 
                            
                        if( get_adjacent_post(true, '', false) ) { 
                            next_post_link('%link', '<span>Next Post</span><i class="fa fa-angle-right"></i>');
                        } else { 
                            $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 1,
                                        'order'          => 'ASC'
                                    );
                                    $last = new WP_Query( $args ); $last->the_post();
                                    echo '<a href="' . get_permalink() . '"><span>Next Post</span><i class="fa fa-angle-right"></i></a>';
                                    wp_reset_query();
                        }; 
                    ?>
                </div>
                <div class="single-actions">
                    <div class="like-button like-button__posts">
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
<?php get_footer(); ?>  
<script>
    // $.fn.scrollView = function () {
    //   return this.each(function () {
    //     $('html, body').animate({
    //       scrollTop: $(this).offset().top
    //     }, 2000);
    //   });
    // }

      
      // $('.video-single-page').css('height', '300px');
      // // $('.video-single-page').addClass("video-tall");

      // // $('.video-single-page').addClass("video-tall");
      // // $('#spg').scrollView();

    // });

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


