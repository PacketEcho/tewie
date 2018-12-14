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
		<main class="site-main pt-3" id="main">
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

<?php do_action( 'tewwie_news_section', array('title' => "NEWS", 'category' => $category, 'posts_per_page' => 5) ); ?>
<?php do_action( 'tewwie_events_section', array('title' => "EVENTS", 'category' => $category, 'posts_per_page' => 3) ); ?>

<?php get_footer(); ?>
