<?php
/**
 * Announcement layout for Display Posts Shortcode
 *
**/

$allowed_html = simple_allowed_html();

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" class="clearfix">
    <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            <?php echo wp_kses( force_balance_tags( get_the_title() ), $allowed_html ); ?>
        </a></h3>
    <div class="entry-content clearfix">
		<?php the_excerpt(); ?>
    </div><!-- .entry-content -->
    <div class="entry-footer py-3 text-muted">
        <span class="byline pr-3">
            <span class="sr-only sr-only-focusable">Posted by</span>
            <i class="fas fa-user-alt"></i> 
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
        </span>
        <span class="posted-on pr-3">
            <span class="sr-only sr-only-focusable">Posted on</span>
            <i class="fas fa-clock"></i> 
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="Published date" rel="bookmark"><time class="date updated published" datetime="<?php echo esc_html( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_time( get_option( 'date_format' ) ) ); ?></time></a>
        </span>
        <?php edit_post_link( __( 'Edit', 'tewwie' ), $before = '<i class="fas fa-pencil-alt"></i> ', '', null, ''); ?>
    </div>
</article><!-- #post-## -->