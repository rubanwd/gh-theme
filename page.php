<?php
/*
Template Name: About Page/Contact
*/
?>

<?php get_header('static'); ?>
        
        <div>
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>





                    

                    <div class="text-about-wrapp">
                        <div class="text-about">
                            <?php the_content() ?>
                        </div>
                    </div>

                    


            <?php endwhile; ?>

                <?php else: ?>
                    
                <?php endif; ?>
        </div>

<?php get_footer(); ?>

