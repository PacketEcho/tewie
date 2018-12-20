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
				<?php tewwie_events_content( $category, $posts_per_page, $include_excerpt ); ?>
			</div>
		</section>
		<?php
	}

endif;

if ( ! function_exists( 'tewwie_events_content' ) ) {
	function tewwie_events_content( $category, $posts_per_page, $include_excerpt ) {
		global $post;

		$args = array(
			'eventDisplay'     	=> 'upcoming',
			'tribe_events_cat'  => $category,
			'posts_per_page'  	=> $posts_per_page
		);

		$events = tribe_get_events( $args );

		if ( !empty( $events ) ) {
			echo '<div class="card-deck">';
			foreach ( $events as $post ) {
				setup_postdata( $post );
				$categories = wp_get_post_terms(get_the_id(), 'tribe_events_cat', array("fields" => "all"));
				$category_bg = empty( $categories ) ? 'default' : $categories[0]->slug;
				$all_day_event = tribe_event_is_all_day($post->ID);
				$excerpt = get_the_excerpt();
				?>
				<div class="card bg-<?php echo $category_bg; ?> border-0" id="post-<?php the_ID(); ?>">
					<div class="card-body text-center">
						<h4 class="card-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php echo wp_kses( force_balance_tags( get_the_title() ), array(
									'a' => array(
										'href' => array(),
									),
							) ); ?>
						</a></h4>
						<h6 class="card-subtitle mb-2 text-muted">
							<?php if ( tribe_get_start_date( null, false, 'Y-m-d' ) == tribe_get_end_date( null, false, 'Y-m-d' ) ) : ?>
								<?php echo tribe_get_start_date( null, false, get_option( 'date_format' )); ?>
								<?php if ( !$all_day_event ) : ?>
								<br><?php echo tribe_get_start_date( null, false, 'H:i' ); ?>
								- <?php echo tribe_get_end_date( null, false, 'H:i' ); ?>
								<?php endif; ?>
							<?php else : ?>
								<?php $event_date_format = $all_day_event ? 'jS F Y' : 'jS F Y H:i'; ?>
								<?php echo tribe_get_start_date( null, false, $event_date_format ); ?>
								<br>to
								<br><?php echo tribe_get_end_date( null, false, $event_date_format ); ?>
							<?php endif; ?>
						</h6>
						<?php if ( ! empty( $excerpt ) && $include_excerpt ) : ?>
						<p class="card-text"><?php echo $excerpt; ?></p>
						<?php endif; ?>
					</div>
					<div class="card-footer bg-transparent border-top-0 text-center">
						<?php if ( !empty( $categories ) && !is_wp_error( $categories ) ) : ?>
							<span class="small text-muted"><i class="fas fa-folder text-muted"></i> 
							<?php echo implode(', ', array_map(function ($category) { return $category->name; }, $categories)); ?>
							</span>
						<?php endif; ?>
					</div>
				</div>
				<?php
				wp_reset_postdata();
			}
			echo '</div>';		
		}
		else { ?>
			<div class="row">
				<div class="col">
					<div class="alert alert-primary" role="alert">No events</div>
				</div>
			</div>
		<?php
		}
	}
}
