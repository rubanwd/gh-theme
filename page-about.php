<?php
/*
Template Name: About Page
*/
?>

<?php get_header('static'); ?>
        
        <div class="about-page-content">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="about-us-title">
                        <h1 class="title-pgb-white-nologo">About <span>PGB</span></h1>
                    </div>


                    
                    

                    <div class="text-about-wrapp">
                        <div class="text-about">
                            <?php the_content() ?>
                        </div>
                    </div>

                    
                    
                    
                    <section class="why-pgb">
                        <video autoplay muted loop poster="<?php the_field('about_image'); ?>" id="myAboutVideo">
                            <source src="<?php the_field('about_video'); ?>" type="video/mp4">
                        </video>
                        <div class="wrapp-about-video"></div>

                        <div class="why-pgb-content">
                            <h1 class="title-pgb-white-nologo">WHY <span>PlayGamesBro</span></h1>
                            <img class="why-pgb-graphic" src="<?php bloginfo('template_url'); ?>/img/about-us-graphic.png" alt="graphic">
                        </div>

                        
                    </section>
                    
                    
                

                    <div class="pgb-contact-form" id="contact">

                        <h1 class="title-pgb-white">Contact <span>Us</span></h1>

                        <h3>LETS US KNOW WHAT YOU NEED</h3>

                        <div class="game-content-wrapp"></div>
                        <?php echo do_shortcode( '[contact-form-7 id="39" title="Contact form 1"]' ); ?>
                    </div>

            <?php endwhile; ?>

                <?php else: ?>
                    
                <?php endif; ?>
        </div>

<?php get_footer(); ?>

