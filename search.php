<?php
/**
 * The template for displaying search results pages.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>
<div class="container" id="content" tabindex="-1">
	<div class="row">
		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		<main class="site-main pt-3" id="main">
        <h1>Search Results for: <?php echo get_search_query(); ?></h1>
        <?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'search' ); ?>
            <?php endwhile; // end of the loop. ?>
        <?php else : ?>
            <?php get_template_part( 'loop-templates/content', 'none' ); ?>
        <?php endif; ?>
		</main><!-- #main -->
	</div><!-- .row -->
	<!-- Do the right sidebar check -->
	<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
</div><!-- .container -->

<?php get_footer(); ?>
