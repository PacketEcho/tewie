<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
