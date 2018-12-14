<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 */

$post = get_post();
if ( $post ) {
    $categories = get_the_category( $post->ID );
}

if ( ! empty( $categories ) ) {
    $category = $categories[0]->name;
}

get_header();
?>
<div class="container" id="content">
	<div class="row">
		<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
		<div class="col-md-8 order-md-1 content-area" id="primary">
			<main class="site-main" id="main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->

<?php do_action( 'tewwie_news_section', array('title' => "NEWS", 'category' => $category, 'posts_per_page' => 5) ); ?>
<?php do_action( 'tewwie_events_section', array('title' => "EVENTS", 'category' => $category, 'posts_per_page' => 3) ); ?>

<?php get_footer(); ?>
