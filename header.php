<?php
/**
 * The header for our theme.
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="author" href="<?php echo site_url(); ?>/humans.txt">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="hfeed site" id="page">
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
			<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-transparent">
				<div class="container" >
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="navbar-brand d-lg-none" rel="home"><?php bloginfo( 'name' ); ?></a>
					<button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div id="navbarNavDropdown" class="collapse navbar-collapse mr-auto">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'header_menu',
							'container'       => '',
							'menu_class'      => 'navbar-nav mr-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'header_shortcuts',
							'container'       => '',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'shortcut-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					</div>
				</div><!-- .container -->
			</nav><!-- .site-navigation -->
		</div><!-- #wrapper-navbar end -->
		<?php if ( get_header_image() ) : ?>
			<div id="site-header" class="site-header d-none d-lg-block" style="background-image: url('<?php header_image(); ?>'); background-position: center center;">
				<div class="row h-100 align-items-end">
					<div class="col text-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					</div>
				</div>
			</div>
		<?php endif; ?>