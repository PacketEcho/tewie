<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo site_url(); ?>/xmlrpc.php">
	<link rel="author" href="<?php echo site_url(); ?>/humans.txt">
	<meta name="theme-color" content="#5e72e4">

	<meta name="google-site-verification" content="0w3-bNTp0Jc3I1fI_FDTotygnDQ6gz2Lu9kDSJCpgSM">
	<meta name="msvalidate.01" content="685FAC32773137C94DC728D2774C36A6">
	<meta name='wot-verification' content='d13818041bdbdf382c5e'>
	<meta name='twitter:site' content='@dunstewonline'>
	<meta name='twitter:creator' content='@dunstewonline'>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="hfeed site" id="page">
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
			<a class="skip-link sr-only sr-only-focusable" href="#content">Skip to content</a>
			<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-transparent">
				<div class="container" >
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Duns Tew" itemprop="url" class="navbar-brand d-lg-none" rel="home">Duns Tew</a>
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
			<div id="site-header" class="site-header d-none d-lg-block">
				<div class="row h-100 align-items-end">
					<div class="col text-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">Duns Tew</a>
					</div>
				</div>
			</div>
		<?php endif; ?>