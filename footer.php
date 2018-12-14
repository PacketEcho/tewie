<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */

$the_theme = wp_get_theme();
?>
		<?php get_sidebar( 'subfooter' ); ?>
		<?php get_sidebar( 'footerfull' ); ?>

		<footer id="wrapper-footer" class="footer">
			<div class="container">
				<div class="row py-5">
					<div id="footer_social" class="col-md order-md-6 text-center">
						<h5 class="text-light">Get in touch</h5>
						<div class="socials-media">
							<ul class="list-unstyled">
								<li><a href="https://www.facebook.com/groups/344747845713257/"><i class="fab fa-2x fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/dunstewonline"><i class="fab fa-2x fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/dunstewonline/"><i class="fab fa-2x fa-instagram"></i></a></li>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/contact/"><i class="fas fa-2x fa-envelope-open"></i></a></li>
							</ul>
						</div>
					</div><!-- /.col -->
					<div id="footer_help" class="col-md order-md-1">
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
					<div id="footer_admin" class="col-md order-md-12">
						<h5 class="text-light">Admin</h5>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'footer_menu',
								'container'       => 'ul',
								'container_id'    => '',
								'menu_class'      => 'list-unstyled',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
			<div class="container-fluid copyright">
				<div class="row pt-3">
					<div class="col text-center">
						<p>© <?php bloginfo( 'name' ); ?></p>
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