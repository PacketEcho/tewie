<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer py-3">
		<?php edit_post_link( __( 'Edit', 'understrap' ), '', '', null, $class = 'btn btn-outline-primary'); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
