<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

?>
<div class="container" id="content" tabindex="-1">
	<div class="row">
		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		<main class="site-main pt-3" id="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'news' ); ?>
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
</div><!-- .container  -->

<?php get_footer(); ?>
