<li>
    <a href="<?php the_permalink(); ?>">
        <div class="news-page-thumb" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');background-position:center;"></div>
        <div class="news-text">
            <h1><?php the_title(); ?></h1>
            <h5><?php echo get_the_date(); ?></h5>
			<?php the_excerpt(); ?>
        </div>
	</a>
</li>