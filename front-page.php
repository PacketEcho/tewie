
<?php get_header(); ?>

<?php do_action( 'tewwie_announcement_section', array('title' => "ANNOUNCEMENTS", 'posts_per_page' => 1) ); ?>
<?php do_action( 'tewwie_news_section', array('title' => "NEWS", 'posts_per_page' => 5, 'category' => null) ); ?>
<div class="container" id="content" tabindex="-1">
	<div class="row">
		<div class="col content-area" id="primary">
			<main class="site-main pt-3" id="main">
			<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'loop-templates/content', 'home' );
				endwhile;
			?>
			</main><!-- #main -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
