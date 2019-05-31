<?php
$the_theme = wp_get_theme();
?>
		<?php get_sidebar( 'subfooter' ); ?>
		<?php get_sidebar( 'footerfull' ); ?>

		<footer id="wrapper-footer" class="footer">
			<div class="container">
				<div class="row py-5">
					<div id="footer_social" class="col-md order-md-1">
						<h5 class="text-light">Get in touch</h5>
						<div class="socials-media">
							<ul class="list-unstyled">
								<li><a href="https://www.facebook.com/dunstewonline/"><i class="fab fa-2x fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/dunstewonline/"><i class="fab fa-2x fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/dunstewonline/"><i class="fab fa-2x fa-instagram"></i></a></li>
								<li><a href="https://dunstewonline.herokuapp.com/"><i class="fab fa-2x fa-slack"></i></a></li>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/contact/"><i class="fas fa-2x fa-envelope"></i></a></li>
							</ul>
						</div>
					</div><!-- /.col -->
					<div id="footer_help" class="col-md order-md-6">
						<h5 class="text-light">Help</h5>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'help_menu',
								'container'       => 'ul',
								'container_id'    => '',
								'menu_class'      => 'list-unstyled',
								'fallback_cb'     => '',
								'menu_id'         => 'help-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div><!-- /.col -->
					<div id="footer_admin" class="col-md order-md-6">
						<a href="https://goo.gl/maps/Xw4jgNYsGmm"><img src="<?php echo site_url(); ?>/assets/img/location_map.jpg" alt="Duns Tew location map"></a>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
			<div class="container-fluid copyright">
				<div class="row pt-3">
					<div class="col text-center">
						<p>© <a href="/wp-admin/" class="text-white">Duns Tew</a></p>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer>
	</div>

	<?php wp_footer(); ?>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124840416-1" class="block-cookie"></script>
	<script class="block-cookie">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-124840416-1');
	</script>

	</body>
</html>