<?php
add_action( 'tewwie_announcement_section', 'tewwie_announce' );

if ( ! function_exists( 'tewwie_announce' ) ) {
	function tewwie_announce( $atts ) {
		$title = sanitize_text_field( $atts['title'] );

		$stickies = get_option( 'sticky_posts' );
		// Make sure we have stickies to avoid unexpected output
		if ( $stickies ) {
			$args = array(
				'post__in'            => $stickies,
				'posts_per_page'      => intval( $atts['posts_per_page'] ),
				'ignore_sticky_posts' => 1
			);
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) { ?>
				<section class="section section-announce pt-3">
					<?php
					if ( ! empty( $title ) ) {
						echo '<h2 class="display-4">' . wp_kses_post( $title ) . '</h2>';
					}
					?>
					<?php 
					while ( $the_query->have_posts() ) { 
						$the_query->the_post();
						get_template_part( 'loop-templates/content', 'news-post' );
					} 
					?>
				</section>
			<?php wp_reset_postdata();
			}
		}
	}
}
?>