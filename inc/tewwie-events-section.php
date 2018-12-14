<?php
add_action( 'tewwie_events_section', 'tewwie_events' );
if ( ! function_exists( 'tewwie_events' ) ) :

	function tewwie_events( $atts ) {
		$title            = sanitize_text_field( $atts['title'] );
		$category         = sanitize_text_field( $atts['category'] );
		$posts_per_page   = intval( $atts['posts_per_page'] );
		$include_excerpt  = filter_var( $atts['include_excerpt'], FILTER_VALIDATE_BOOLEAN );
		?>
		<section class="section section-events pt-3 pb-5">
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
				tewwie_events_content( $category, $posts_per_page, $include_excerpt );
				?>
			</div>
		</section>
		<?php
	}

endif;

if ( ! function_exists( 'tewwie_events_content' ) ) {
	function tewwie_events_content( $category, $posts_per_page, $include_excerpt ) {
		$args = array(
			'post_status'     => 'publish',
			'post_type'       => array(TribeEvents::POSTTYPE),
			'category_name'   => $category,
			'posts_per_page'  => $posts_per_page
		);

		$get_posts = new WP_Query( $args );

		if ( $get_posts->have_posts() ) :
			echo '<div class="card-deck">';
			while ( $get_posts->have_posts() ) :
				$get_posts->the_post();
				$categories = get_the_terms( $post, 'tribe_events_cat' );
				if ( empty( $categories ) ) {
					$category_bg = 'default';
					$category_name = 'All';
				}
				else {
					$cats = array();
					foreach( $categories as $category ) {
						$cats[] = '<a href="' . get_category_link($category->term_id) . '" class="text-muted">' . $category->name . '</a>';
					}

					$cat_bg = $categories[0];
					$term = get_term( $cat_bg, $taxonomy );
					$category_bg = $term->slug;
				}
				$excerpt = get_the_excerpt();
				?>
				<div class="card bg-<?php echo $category_bg; ?> border-0" id="post-<?php the_ID(); ?>">
					<div class="card-body text-center">
						<h4 class="card-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php echo wp_kses( force_balance_tags( get_the_title() ), $allowed_html ); ?>
						</a></h4>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo tribe_get_start_date(); ?>
						<?php if ( tribe_get_start_date() != tribe_get_end_date() ) : ?>
						- <?php echo tribe_get_end_date(); ?>
						<?php endif; ?>
						</h6>
						<?php if ( ! empty( $excerpt ) && $include_excerpt ) : ?>
						<p class="card-text"><?php echo $excerpt; ?></p>
						<?php endif; ?>
						<span class="small"><i class="fas fa-folder text-muted"></i> <?php echo implode(", ", $cats); ?></span>
					</div>
				</div>
				<?php
			endwhile;
			echo '</div>';

			wp_reset_postdata();
		else : ?>
			<div class="row">
				<div class="col">
					<div class="alert alert-primary" role="alert">No events</div>
				</div>
			</div>
		<?php
		endif;
	}
}
