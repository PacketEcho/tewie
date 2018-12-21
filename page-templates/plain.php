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
		<main class="site-main col" id="main">
		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'loop-templates/content', 'page' );
			endwhile;
		?>
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
