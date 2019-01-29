<?php
add_action( 'tewwie_news_section', 'tewwie_news' );

if ( ! function_exists( 'tewwie_news' ) ) {
	function tewwie_news( $atts ) {
		$title = sanitize_text_field( $atts['title'] );
	
		$args = array(
			'post__not_in' 		  => get_option( 'sticky_posts' ),
			'category_name'       => sanitize_text_field( $atts['category'] ),
			'posts_per_page'      => intval( $atts['posts_per_page'] ),
		);
		$the_query = new WP_Query( $args );
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
					<div class="row">
						<div class="col">
							<?php 
							if ( $the_query->have_posts() ) {
								
								while ( $the_query->have_posts() ) { 
									$the_query->the_post();
									get_template_part( 'loop-templates/content', 'news-post' );
								} 
							} else { ?>
								<div class="alert alert-primary" role="alert">No news</div>
							<?php }
							?>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
}