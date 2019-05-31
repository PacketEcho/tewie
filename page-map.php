<?php get_header(); ?>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' rel='stylesheet' />

<div class="container" id="content" tabindex="-1">
	<div class="row">
		<main class="site-main pt-3" id="main">
		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'loop-templates/content', 'simple' );
			endwhile;
        ?>
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->
<div class="container-fluid pb-5">
	<div class="row">
        <div id='village-map' class="m-3"></div>
    </div><!-- .row -->
</div><!-- .container-fluid -->
<script src='<?php echo site_url(); ?>/assets/js/map.js'></script>

<?php get_footer(); ?>
