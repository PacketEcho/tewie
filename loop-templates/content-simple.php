<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            <?php echo wp_kses( force_balance_tags( get_the_title() ), $allowed_html ); ?>
        </a></h3>
</article><!-- #post-## -->
