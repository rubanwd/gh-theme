<?php
get_header('static');
global $wp_query;
?>
<div class="wapper">
    <div class="content-search">
      <h1 class="search-title"> <?php echo $wp_query->found_posts; ?>
        <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>
        <hr>
        <?php if ( have_posts() ) { ?>

            <ul class="content-search__item">

            <?php while ( have_posts() ) { the_post(); ?>

               <li>
                 <h2>
                    <a href="<?php the_permalink(); ?>">
                     <?php the_title();  ?>
                   </a>
                  </h2>
                 <?php  the_post_thumbnail('medium') ?>
                 <article><?php echo substr(get_the_excerpt(), 0,300); ?></article>
                 <div class="learn-more-button search-btn">
                      <a href="<?php the_permalink() ?>">Learn More</a>
                  </div>
               </li>

               <hr>

            <?php } ?>

            </ul>

            <div class="blog-paginav">
                <?php wpbeginner_numeric_posts_nav(); ?>
            </div>

        <?php } ?>

    </div>

</div>
<?php get_footer(); ?>