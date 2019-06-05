<?php get_header(); ?>

<div class="container" id="content" tabindex="-1">
	<div class="row">
		<main class="site-main col pt-5" id="main">
		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'loop-templates/content', 'news' );
			endwhile;
		?>
		<?php understrap_pagination(); ?>
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container  -->

<?php get_footer(); ?>
