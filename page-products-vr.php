<?php
/*
Template Name: Product VR

*/
?>
<?php get_header('static'); ?>  
        
        <div class="content">

            <div class="products-content-games products-content__sidebar">
                <div class="hardw-content-wrapp"></div>



                <div class="content-text">
                    <h1 class="title-pgb-simple">VR Games Review</h1>
                    <ul>
                        <?php 
                            echo do_shortcode('[ajax_vr]'); 
                        ?>
                    </ul> 
                </div>
                <div class="pgb-sidebar blue-lines">
                    <div class="pgb-sidebar__wrapp"></div>
                    <div class="sidebar-content">


                        <section class="sidebar-top-widget">
                            <div class="widget-soc">
                                <a rel="nofollow" href="https://www.facebook.com/groups/PlayGamesBrother/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a rel="nofollow" href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a rel="nofollow" href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a rel="nofollow" href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                            </div>


                            

                            <button id="search-widget" class="widget-search-button"><i class="fas fa-search"></i></button>

                            <div class="widget-menu-divider">|</div>
                            <button class="widget_menu_button">
                                <div></div>
                                <div></div>
                                <div></div>
                            </button>
                            

                        </section>
                        

                        <section class="sidebar-last-reviews">

                            <h2 class="title-sidebar">Latest Reviews</h2>
                            <ul class="">
                                <?php 
                                    $args = array(
                                        'posts_per_page' => '5',
                                        'post_type' => 'products',
                                        'order'   => 'DESC'
                                    );
                                    $products = new WP_Query( $args ); 
                                 ?>
                                <?php if ( $products->have_posts() ) : ?>
                                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                                            <li class="sidebar-prod-item">
                                                <a href="<?php the_permalink() ?>" class="">
                                                    <div class="thumb-sidebar-prod" style="background-image: url('<?php the_field('game_image'); ?>'); background-repeat: no-repeat;background-position: top; background-size: cover;">
                                                    </div>
                                                    <h4 class="sidebar-prod-title"><?php the_title() ?>
                                                    </h4>
                                                </a>
                                            </li>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </section>


                        <!-- <section class="sidebar-last-news">

                            <h2 class="title-sidebar">Latest News</h2>
                            <ul class="">
                                <?php 
                                    $args = array(
                                        'posts_per_page' => '3',
                                        'order'   => 'DESC'
                                    );
                                    $wp_query = new WP_Query( $args ); 
                                 ?>
                                <?php if ( $wp_query->have_posts() ) : ?>
                                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                                            <li class="sidebar-prod-item">
                                                <a href="<?php the_permalink() ?>" class="">
                                                    <div class="thumb-sidebar-prod" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>'); background-repeat: no-repeat;background-position: top; background-size: cover;">
                                                    </div>
                                                    <h4 class="sidebar-prod-title"><?php the_title() ?>
                                                    </h4>
                                                </a>
                                            </li>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </section> -->

                        <!-- <section class="sidebar-newsletter">

                            <h2 class="title-sidebar">Newsletter</h2>

                            <div class="form-newsletter">
                                <?php echo do_shortcode( '[contact-form-7 id="38" title="newsletter"]' ); ?>
                            </div>
                        </section> -->

                    </div>
                </div>
            </div>

            


            
        </div>
<?php get_footer(); ?>  
<script src="<?php bloginfo('template_url'); ?>/js/templates/page-products-vr.js"></script>