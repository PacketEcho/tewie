<?php
add_action( 'tewwie_news_section', 'tewwie_news' );

if ( ! function_exists( 'tewwie_news' ) ) :
	function tewwie_news( $atts ) {
		$title          = sanitize_text_field( $atts['title'] );
		$category       = sanitize_text_field( $atts['category'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		?>
		<section class="section section-news pt-3 pb-5">
			<div class="container">
					<div class="row">
						<div class="col">
							<?php
							if ( ! empty( $title ) ) {
								echo '<h2 class="display-4">' . wp_kses_post( $title ) . '</h2>';
							}
							?>
						</div>
					</div>
					<?php
					tewwie_news_content( $category, $posts_per_page );
					?>
			</div>
		</section>
		<?php
	}

endif;

if ( ! function_exists( 'tewwie_news_content' ) ) {
	function tewwie_news_content( $category, $posts_per_page ) {
		$args = array(
			'ignore_sticky_posts' => true,
			'category_name'       => $category,
			'posts_per_page'      => $posts_per_page
		);

		$loop = new WP_Query( $args );

		if ( $loop->have_posts() ) :
			echo '<div class="row">';
			while ( $loop->have_posts() ) :
				$loop->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" class="col-12">
					<h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php echo wp_kses( force_balance_tags( get_the_title() ), array(
								'a' => array(
									'href' => array(),
								),
							) ); ?>
						</a></h3>
					<?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
					<div class="entry-content">
						<?php the_excerpt(); ?>
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
						<?php if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) : ?>
							<span class="updated-on pr-3">
								<span class="sr-only sr-only-focusable">Published on</span>
								<i class="far fa-clock"></i> 
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="Last modified date" rel="bookmark"><time class="date updated" datetime="<?php echo esc_html( get_the_modified_time( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_modified_time( 'Y-m-d H:i' ) ); ?></time></a>
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
						<?php $post_tags = get_the_tags( get_the_ID() ); ?>
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
			<?php
			endwhile;
			echo '</div>';

			wp_reset_postdata();
		else : ?>
			<div class="row">
				<div class="col">
					<div class="alert alert-primary" role="alert">No news</div>
				</div>
			</div>
		<?php
		endif;
	}
}