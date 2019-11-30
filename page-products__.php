<?php
/*
Template Name: Recently Closed
Template Post Type: page
*/
?>
<?php get_header(); ?>  
        
        <div class="content">

            <div class="projects-content">

                <h2 class="title-cs">Recently Closed</h2>

                <div class="slider-container">
                    
                    <div class="controllers">
                        <span class="prev"><img src="<?php bloginfo('template_url'); ?>/img/arrow-left-g.png" alt="arrow_prev"></span>
                        <span class="next"><img src="<?php bloginfo('template_url'); ?>/img/arrow-right-g.png" alt="arrow_next"></span>
                    </div>

                    <ul class="slider-single">


                        <?php 
                            $args = array(
                                'posts_per_page' => '-1',
                                'post_type' => 'products',
                                
                            );

                            $products = new WP_Query( $args ); 
                         ?>
                    
                        <?php if ( $products->have_posts() ) : ?>
                            <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                                    <li class="project-item item">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'project-image', 'title' => 'Feature image']); ?>
                                        
                                        <div class="project-content-row">

                                            <div class="project-info-box">
                                                <div><img src="<?php bloginfo('template_url'); ?>/img/03icon1.png"><span><?php echo get_post_meta($post->ID, 'place', true);  ?></span></div>
                                                <div><img src="<?php bloginfo('template_url'); ?>/img/03icon2.png"><span><?php echo get_post_meta($post->ID, 'kind', true);  ?></span></div>
                                                <div><img src="<?php bloginfo('template_url'); ?>/img/03icon3.png"><span><?php echo get_post_meta($post->ID, 'estate', true);  ?></span></div>
                                                <div><img src="<?php bloginfo('template_url'); ?>/img/03icon4.png"><span><?php echo get_post_meta($post->ID, 'percent', true);  ?></span></div>
                                            </div>

                                            <div class="project-text-box">

                                                <a href="<?php the_permalink(); ?>"><h3><?php the_title() ?> <span>- $ <?php echo get_post_meta($post->ID, 'money', true);  ?></span></h3></a>
                                                <article><?php the_content(); ?></article>
                                            </div>

                                        </div>

                                    </li>

                        <?php endwhile; ?>

                        <?php else: ?>
                            
                        <?php endif; ?>
                        
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>    
            </div>
        </div>
<?php get_footer(); ?>  