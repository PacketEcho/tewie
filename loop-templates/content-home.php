<?php
/**
 * Partial template for content in front-page.php
 *
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<div class="entry-content clearfix">
		<?php $content = apply_filters( 'the_content', get_the_content() );
		echo $content; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
