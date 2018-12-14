<?php
/**
 * Template Name: Plain Layout
 *
 * The template for displaying pages without news and events
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
<div class="container" id="content" tabindex="-1">
	<div class="row">
		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		<main class="site-main" id="main">
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
	</div><!-- .row -->
	<!-- Do the right sidebar check -->
	<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
</div><!-- .container -->

<?php get_footer(); ?>
