<li class="product-cat-item">
    <a href="<?php the_permalink(); ?>"> 
        <div class="wrapp-item-image__cat" >
            <!-- <video autoplay muted loop poster="<?php the_field('game_image'); ?>" id="myVideo" class="video-hover__cat">
                <source src="<?php the_field('single_video'); ?>" type="video/mp4">
            </video> -->
            <div class="thumb-cat" style="background-image: url('<?php the_field('game_image'); ?>'); background-repeat: no-repeat;background-position: top; background-size: cover;"></div>
        </div>
        <div class="product-cat-item__descr">
            <h3><a href="<?php the_permalink(); ?>">
            	<?php if( get_field('short_title') ): ?>
                    <?php the_field('short_title'); ?>
                <?php else: ?>
                    <?php the_title() ?>
                <?php endif; ?></a>
            </h3>
            <article>
                <h4>
                    <?php if( get_field('short_descripton') ): ?>
                        <?php the_field('short_descripton'); ?>
                    <?php else: ?>
                        <?php excerpt(18) ?><span>...</span>
                    <?php endif; ?>
                </h4>
                <div class="learn-more-button__small"><a href="<?php the_permalink(); ?>">Learn More</a></div>
            </article>
        </div>
    </a>
</li>
