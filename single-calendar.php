<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
?>

<div class="container" id="content" tabindex="-1">
	<div class="row">
		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		<main class="site-main pt-5" id="main">
		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'loop-templates/content', 'calendar' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile;
		?>
		</main><!-- #main -->
		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
