<?php get_header('static'); ?>  
    <div class="single-page swipe-content">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                
                <div class="product-single-title">

                    <div class="video-single-page" >

                        <video autoplay muted loop poster="<?php the_field('game_image'); ?>" id="mySingleVideo">
                            <source src="<?php the_field('single_video'); ?>" type="video/mp4">
                        </video>

                        <div class="single-video-transparent"></div>

                        <h1>
                            <?php if( get_field('short_title') ): ?>
                                <?php the_field('short_title'); ?>
                            <?php else: ?>
                                <?php the_title() ?>
                            <?php endif; ?>
                        </h1>

                        <span id="arrow-bottom-single" class="arrow-bottom arrow-bottom-single">
                            <img src="<?php bloginfo('template_url'); ?>/img/giphy.gif" alt="arrow-bottom">
                        </span>

                        <span class="click-me">
                            <img src="<?php bloginfo('template_url'); ?>/img/click-me.png" alt="click-me">
                        </span>

                    </div>
                </div>


                <div class="platform-support-single">

                    <?php if (get_field('pc')): ?>
                        <img class="pc-pl" src='<?php bloginfo('template_url'); ?>/img/pc-pl.png' alt='pc'>
                    <?php endif; ?>

                    <?php if (get_field('xbox')): ?>
                        <img class="xbox-pl" src='<?php bloginfo('template_url'); ?>/img/xbox-pl.png' alt='xbox'>
                    <?php endif; ?>

                    <?php if (get_field('ps')): ?>
                        <img class="ps-pl" src='<?php bloginfo('template_url'); ?>/img/ps-pl.png' alt='ps'>
                    <?php endif; ?>

                    <?php if (get_field('nintendo')): ?>
                        <img class="nintendo-pl" src='<?php bloginfo('template_url'); ?>/img/nintendo-pl.png' alt='nintendo'>
                    <?php endif; ?>

                    <?php if (get_field('vr')): ?>
                        <img class="vr-pl" src='<?php bloginfo('template_url'); ?>/img/vr-pl.png' alt='vr'>
                    <?php endif; ?>

                </div>



                <div class="single-product-content" id="spg">
                    <div class="product-image-wrapp">
                        <img class="product-image" src="<?php the_field('game_image'); ?>" alt="<?php the_title() ?>">
                        <img class="product-image-shadow" src="<?php bloginfo('template_url'); ?>/img/shadow.png" alt="">
                        <img class="product-image-shadow-mobile" src="<?php bloginfo('template_url'); ?>/img/shadow.png" alt="">
                    </div>
                    
                    <div class="single-product-content__text">
                        <h1><?php the_title() ?></h1>
                        <time class="product-publish-date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                        <article class="prod-text"><?php the_content(); ?></article>
                        <div class="single-page-arrows">
                            <?php            
                                /**
                                 *  Infinite next and previous post looping
                                 */
                                if( get_adjacent_post(true, '', true) ) { 
                                    previous_post_link('%link', '<i class="fa fa-angle-left"></i><span>Previous Post</span> ', true );
                                } else { 
                                    $args = array(
                                                'post_type' => 'products',
                                                'posts_per_page' => 1,
                                                'category_name' => 'video-games',
                                                'order'          => 'DESC'
                                            );
                                            $first = new WP_Query( $args ); $first->the_post();
                                            echo '<a href="' . get_permalink() . '"><i class="fa fa-angle-left"></i><span>Previous Post</span> </a>';
                                            wp_reset_query();
                                }; 
                                    
                                if( get_adjacent_post(true, '', false) ) { 
                                    next_post_link('%link', '<span>Next Post</span><i class="fa fa-angle-right"></i>', true);
                                } else { 
                                    $args = array(
                                                'post_type' => 'products',
                                                'posts_per_page' => 1,
                                                'category_name' => 'video-games',
                                                'order'          => 'ASC'
                                            );
                                            $last = new WP_Query( $args ); $last->the_post();
                                            echo '<a href="' . get_permalink() . '"><span>Next Post</span><i class="fa fa-angle-right"></i></a>';
                                            wp_reset_query();
                                }; 
                            ?>
                        </div>
                        <img class="swipe-side" src="<?php bloginfo('template_url'); ?>/img/swipe-side.gif" alt="">
                        <div class="estimation-section">
                            <div class="pgb-score">
                                <h4>PGB score:&nbsp<div><span>
                                        <?php the_field('score_rate'); ?>/10
                                </span> <span> <em>(<?php the_field('good_word_rate'); ?>!)</em></span></div></h4>
                            </div>
                            <div class="like-button">
                                <?php echo getPostLikeLink(get_the_ID());?>
                            </div>
                        </div>
                        <div class="comments-action">
                            <h4>Have you already played "<?php the_title() ?>" ? Tell us about your impressions and successes in comments <br> ↓↓↓</h4>
                        </div>
                    </div>
                    <?php comments_template( '/comments.php' ); ?> 
                </div>  
            <?php endwhile; ?>
        <?php else: ?>          
        <?php endif; ?>
    </div>
<?php get_footer(); ?>  
<script src="<?php bloginfo('template_url'); ?>/js/templates/single-products-games.js"></script>