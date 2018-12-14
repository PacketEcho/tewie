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
	<div class="entry-meta pb-3 text-muted">
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
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'tewwie' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-footer py-3 text-muted">
		<span class="byline pr-3">
			<span class="sr-only sr-only-focusable">Written by</span>
			<i class="fas fa-user-alt"></i> 
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
		</span> 
		<span class="posted-on pr-3">
			<span class="sr-only sr-only-focusable">Published on</span>
			<i class="fas fa-clock"></i> 
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="Published date" rel="bookmark"><time class="date published" datetime="<?php echo esc_html( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_time( get_option( 'date_format' ) ) ); ?></time></a>
		</span>
		<?php if ( get_the_modified_time( 'o-m-d' ) != get_the_time( 'o-m-d' ) ) : ?>
			<span class="updated-on pr-3">
				<span class="sr-only sr-only-focusable">Published on</span>
				<i class="far fa-clock"></i> 
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="Last modified date" rel="bookmark"><time class="date updated" datetime="<?php echo esc_html( get_the_modified_time( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_modified_time( 'jS F Y' ) ); ?></time></a>
			</span>
		<?php endif; ?>
		<span class="posted-in pr-3">
			<span class="sr-only sr-only-focusable">Posted in</span>
			<i class="fas fa-folder"></i> 
            <?php
            $cats = array();
			foreach((get_the_category()) as $category) {
                $cats[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
            }
            echo implode(", ", $cats);
			?>
		</span>
		<?php $post_tags = get_the_tags( $post->ID ); ?>
		<?php if ( $post_tags ) : ?>
			<span class="tagged-as pr-3">
				<span class="sr-only sr-only-focusable">Tagged as</span>
				<i class="fas fa-tags"></i> 
                <?php
                $tags = array();
				foreach( $post_tags as $tag ) {
					$tags[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
				}
                echo implode(", ", $tags);
				?>
			</span>
		<?php endif; ?>
		<?php $num_comments = get_comments_number(); ?>
		<?php if ( $num_comments > 0 ) : ?>
			<span class="comments pr-3">
				<span class="sr-only sr-only-focusable">Comments</span>
				<i class="fas fa-comment-alt"></i> 
				<?php comments_number( '', '1 comments', '% comments' ); ?>
			</span> 
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'understrap' ), $before = '<i class="fas fa-pencil-alt"></i> ', '', null, ''); ?>
	</div><!-- .entry-footer -->
</article><!-- #post-## -->
