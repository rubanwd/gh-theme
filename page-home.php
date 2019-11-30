<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>  
    
<div class="content">

    <section class="header-content page-section">
        
        <div class="slide">
            
            <?php 
                $args = array(
                    'posts_per_page' => '-1',
                    'post_type' => 'slider',
                    'order'   => 'DESC'
                );
                $slider = new WP_Query( $args ); 
                ?>


                <?php if ( $slider->have_posts() ) : ?>

                    <ul>
                        <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
                            <li class="single-slide">
                                <div class="slide-transparent"></div>
                                <div class="title-slug">
                                    <div>
                                        <h1><?php the_field('slide_title'); ?></h1>
                                    </div>
                                </div>
                                <video autoplay muted loop poster="<?php the_field('slide_image'); ?>" id="myVideo">
                                  <source src="<?php the_field('slide_video'); ?>" type="video/mp4">
                                </video>
                            </li>
                        <?php endwhile; ?>
                    </ul>

            <?php else: ?>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
            
            <a rel="nofollow" href="#latest" class="arrow-bottom arrow-bottom-home"><img src="<?php bloginfo('template_url'); ?>/img/giphy.gif" alt=""></a>
        </div>
        <div class="video-arrows">
            <a rel="nofollow" class="arrow-left"><i class="fa fa-angle-left"></i></a>
            <a rel="nofollow" class="arrow-right"><i class="fa fa-angle-right"></i></a>
        </div>

    </section>


    <section class="blog-content page-section" id="latest">
        <h2 class="title-pgb">Latest Reviews</h2>
        <ul class="blog-box">
            <?php 
                $args = array(
                    'posts_per_page' => '4',
                    'post_type' => 'products',
                    'order'   => 'DESC'
                );
                $products = new WP_Query( $args ); 
             ?>
            <?php if ( $products->have_posts() ) : ?>
                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                        <li title="<?php the_title() ?>" class="blog-item" style="background-image: url('<?php the_field('game_image'); ?>');background-position:center;">
                            <!-- <a class="blog-box-link" href="<?php the_permalink() ?>"></a>-->                                    
                            <div class="blog-info">
                                <a class="blog-box-link" href="<?php the_permalink() ?>"></a>

                                <h3 class="blog-date">
                                    <?php echo get_the_date(); ?>
                                </h3>
                                <div class="blog-info__descr">
                                    <h3 class="blog-title">
                                        <?php if( get_field('short_title') ): ?>
                                            <?php the_field('short_title'); ?>
                                        <?php else: ?>
                                            <?php the_title() ?>
                                        <?php endif; ?>
                                    </h3>
                                    <div class="blog-excerpt">
                                        <?php if( get_field('short_descripton') ): ?>
                                            <h4><?php the_field('short_descripton'); ?></h4>
                                        <?php else: ?>
                                            <?php the_excerpt(10) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- <div class="main-button home-blog-button">
                                    <a href="<?php the_permalink() ?>">Read More</a>
                                </div> -->
                            </div>
                        </li>

            <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
        <div class="learn-more-button learn-more-button">
            <a href="<?php echo get_site_url(); ?>/latest-reviews/">View All</a>
        </div>
    </section>

    <section class="products-content page-section" id="games">
        <div class="game-content-wrapp"></div>

        <!-- <h2 class="title-pgb-white" id="games-review">Games <span>Review</span></h2> -->
        <img class="games-review-title" src='<?php bloginfo('template_url'); ?>/img/games-review.png' alt='Games Review'>
        

        <div class="slider-container">
            
            <div class="controllers controllers-slider-games">
                <span class="next"><i class="fa fa-angle-left"></i></span>
                <span class="prev"><i class="fa fa-angle-right"></i></span>
            </div>

            <ul class="slider-games">


                <?php 
                    $args = array(
                        'posts_per_page' => '8',
                        'post_type' => 'products',
                        'category_name' => 'video-games',
                        'order'   => 'DESC'
                    );

                    $products = new WP_Query( $args ); 
                 ?>
            
                <?php if ( $products->have_posts() ) : ?>
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                            <li class="product-item item">
                                <a class="wrapp-item-image_permalink" href="<?php the_permalink(); ?>"></a>
                                <div class="wrapp-item-image" >
                                    

                                    <div class="platform-support-slide">

                                        <?php if (get_field('pc')): ?>
                                            <img class="pc-pl" src='<?php bloginfo('template_url'); ?>/img/pc-pl-s2.png' alt='pc'>
                                        <?php endif; ?>

                                        <?php if (get_field('xbox')): ?>
                                            <img class="xbox-pl" src='<?php bloginfo('template_url'); ?>/img/xbox-pl-s2.png' alt='xbox'>
                                        <?php endif; ?>

                                        <?php if (get_field('ps')): ?>
                                            <img class="ps-pl" src='<?php bloginfo('template_url'); ?>/img/ps-pl-s2.png' alt='ps'>
                                        <?php endif; ?>

                                        <?php if (get_field('nintendo')): ?>
                                            <img class="nintendo-pl" src='<?php bloginfo('template_url'); ?>/img/nintendo-pl-s2.png' alt='nintendo'>
                                        <?php endif; ?>

                                        <?php if (get_field('vr')): ?>
                                            <img class="vr-pl" src='<?php bloginfo('template_url'); ?>/img/vr-pl-s2.png' alt='vr'>
                                        <?php endif; ?>

                                    </div>

                                    <div class="pgb-score-slide">
                                        <div><span><span>P</span>GB</span><br>score</div>
                                        <div><?php the_field('score_rate'); ?>/10</div>
                                    </div>

                                    <img class="box-click-action" src='<?php bloginfo('template_url'); ?>/img/click-me.png' alt='vr'>

                                    <div class="video-hover">
                                        
                                        <video autoplay muted loop poster="<?php the_field('game_image'); ?>" id="myVideo">
                                            <source src="<?php the_field('single_video'); ?>" type="video/mp4">
                                        </video>
                                        
                                    </div>
                                    <div title="<?php the_title() ?>" class="thumb-prod-slide" style="background-image: url('<?php the_field('game_image'); ?>'); background-repeat: no-repeat;background-position: top; background-size: cover;">
                                    </div>
                                    <h3>
                                        <span>
                                            <?php the_title() ?>   
                                        </span>
                                        
                                    </h3>
                                </div>
                                <div class="product-info-items">
                                    <img class="slide-clickme-bcg" src='<?php bloginfo('template_url'); ?>/img/click-me-gr.png' alt=''>
                                    <a href="<?php the_permalink(); ?>">
                                    
                                        <?php if( get_field('short_descripton') ): ?>
                                            <?php the_field('short_descripton'); ?>
                                        <?php else: ?>
                                            <?php excerpt(18) ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <!-- <a class="item-link" href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/games-triangle.png" alt="Learn More"></a> -->
                                <img class="floor" src="<?php bloginfo('template_url'); ?>/img/recently-floor.png" alt="">
                            </li>
                    <?php endwhile; ?>

                <?php else: ?>
                    
                <?php endif; ?>
                
                <?php wp_reset_postdata(); ?>
            </ul>

            

        </div>
        
        <div class="learn-more-button learn-more-button__white">
            <a href="<?php echo get_site_url(); ?>/games/">View All</a>
        </div>
        
    </section>

    <section class="news-content page-section" id="vr">

        <!-- <div class="news-content-wrapp"></div> -->

        <img class="vr-face" src="<?php bloginfo('template_url'); ?>/img/vr-bcg-3.png" alt="">

        <h2 class="title-pgb-plain"><span style="color:#508b00;"><img class="vr-pl-home" src="<?php bloginfo('template_url'); ?>/img/vr-pl-home.png" alt="VR"></span> Games</h2>

        <div class="news-home-box">

            
            

            <ul>
                <?php 
                    $args = array(
                        'posts_per_page' => '3',
                        'post_type' => 'products',
                        'category_name' => 'vr-games',
                        'order'   => 'DESC'
                    );

                    $products = new WP_Query( $args ); 
                 ?>
            
                <?php if ( $products->have_posts() ) : ?>
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                        <li class="vr-home-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="news-home-thumb ">
                                    <img class="vr-product-image" src="<?php the_field('game_image'); ?>" alt="<?php the_title() ?>">
                                    <!-- <img class="product-image-shadow-home-vr" src="<?php bloginfo('template_url'); ?>/img/shadow-btn.png" alt=""> -->
                                </div>

                                
                                <h1><?php if( get_field('short_title') ): ?>
                                        <?php the_field('short_title'); ?>
                                    <?php else: ?>
                                        <?php the_title() ?>
                                    <?php endif; ?>
                                </h1>
                                <time class="vr-publish-date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                                <article class="vr-home-text">
                                    <?php if( get_field('short_descripton') ): ?>
                                        <?php the_field('short_descripton'); ?>
                                    <?php else: ?>
                                        <?php excerpt(18) ?><span>...</span>
                                    <?php endif; ?>
                                </article>

                            </a>
                        </li>

                <?php endwhile; ?>
                
                <?php else: ?>
                    
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </ul>

            

            
        </div>

        <div class="learn-more-button">
            <a href="<?php echo get_site_url(); ?>/vr/">View All</a>
        </div>

    </section>

    <section class="products-content page-section" id="hardware">
        <div class="hardw-content-wrapp"></div>

        <h2 class="title-pgb-white" >Hardware Review</h2>

        <div class="slider-container">
            
            <div class="controllers controllers-slider-soft">
                <span class="next"><i class="fa fa-angle-left"></i></span>
                <span class="prev"><i class="fa fa-angle-right"></i></span>
            </div>

            <ul class="slider-soft">


                <?php 
                    $args = array(
                        'posts_per_page' => '8',
                        'post_type' => 'products',
                        'category_name' => 'games-hardware',
                        'order'   => 'DESC'
                    );

                    $products = new WP_Query( $args ); 
                 ?>
            
                <?php if ( $products->have_posts() ) : ?>
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                            

                            <li class="product-item item">
                                <a class="wrapp-item-image_permalink" href="<?php the_permalink(); ?>"></a>


                                <div class="wrapp-item-image wrapp-item-image-green" >
                                    
                                    <div class="platform-support-slide">

                                        <?php if (get_field('pc')): ?>
                                            <img class="pc-pl" src='<?php bloginfo('template_url'); ?>/img/pc-pl-s2.png' alt='pc'>
                                        <?php endif; ?>

                                        <?php if (get_field('xbox')): ?>
                                            <img class="xbox-pl" src='<?php bloginfo('template_url'); ?>/img/xbox-pl-s2.png' alt='xbox'>
                                        <?php endif; ?>

                                        <?php if (get_field('ps')): ?>
                                            <img class="ps-pl" src='<?php bloginfo('template_url'); ?>/img/ps-pl-s2.png' alt='ps'>
                                        <?php endif; ?>

                                        <?php if (get_field('nintendo')): ?>
                                            <img class="nintendo-pl" src='<?php bloginfo('template_url'); ?>/img/nintendo-pl-s2.png' alt='nintendo'>
                                        <?php endif; ?>

                                        <?php if (get_field('vr')): ?>
                                            <img class="vr-pl" src='<?php bloginfo('template_url'); ?>/img/vr-pl-s2.png' alt='vr'>
                                        <?php endif; ?>

                                    </div>

                                    <div class="pgb-score-slide">
                                        <div><span><span>P</span>GB</span><br>score</div>
                                        <div><?php the_field('score_rate'); ?>/10</div>
                                    </div>
                                    <img class="box-click-action" src='<?php bloginfo('template_url'); ?>/img/click-me.png' alt='vr'>

                                    <div class="wrapp-bkg-item"></div>

                                    <div class="video-hover">
                                    
                                        <video autoplay muted loop poster="<?php the_field('game_image'); ?>" id="myVideo">
                                            <source src="<?php the_field('single_video'); ?>" type="video/mp4">
                                        </video>
                                    </div>

                                    <div class="thumb-prod-slide" style="background-image: url('<?php the_field('game_image'); ?>'); background-repeat: no-repeat;background-position: top; background-size: cover;">
                                    </div>
                                    <h3>
                                        <span>
                                            <?php if( get_field('short_title') ): ?>
                                                <?php the_field('short_title'); ?>
                                            <?php else: ?>
                                                <?php the_title() ?>
                                            <?php endif; ?>
                                        </span>
                                    </h3>

                                </div>

                                <div class="product-info-items">
                                    <img class="slide-clickme-bcg" src='<?php bloginfo('template_url'); ?>/img/click-me-gr.png' alt=''>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if( get_field('short_descripton') ): ?>
                                            <?php the_field('short_descripton'); ?>
                                        <?php else: ?>
                                            <?php excerpt(18) ?>
                                        <?php endif; ?>
                                    </a>

                                </div>
                                <!-- <a class="item-link" href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/games-triangle-blue.png" alt="Learn More"></a> -->
                                <img class="floor" src="<?php bloginfo('template_url'); ?>/img/recently-floor-green.png" alt="">
                                
                            </li>
                        
                <?php endwhile; ?>

                <?php else: ?>
                    
                <?php endif; ?>
                
                <?php wp_reset_postdata(); ?>
            </ul>

        </div>
        
        <div class="learn-more-button learn-more-button__green">
            <a href="<?php echo get_site_url(); ?>/game-hardware-platforms/">View All</a>
        </div>

    </section>


</div>  
<?php get_footer(); ?>  
<script src="<?php bloginfo('template_url'); ?>/js/templates/home-script.js"></script>