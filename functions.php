<?php

define( 'TEWWIE_PHP_INCLUDE', trailingslashit( get_stylesheet_directory() ) . 'inc/' );

/**
 * Load custom WordPress nav walker.
 */
// require get_stylesheet_directory() . '/inc/T5-wp-navwalker.php';
// require get_stylesheet_directory() . '/inc/footer-navwalker.php';

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );
	// wp_dequeue_style( 'contact-form-7' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function remove_plugin_scripts_and_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdm-front' );
	wp_dequeue_style( 'theme-my-login-css' );
}
add_action( 'wp_enqueue_scripts', 'remove_plugin_scripts_and_styles', 20 );

function theme_enqueue_styles() {
	$the_theme = wp_get_theme();

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/dist/tewwie.css', array(), time() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'tewwie-scripts', get_stylesheet_directory_uri() . '/js/tewwie.js', array(), false );
	wp_enqueue_script( 'cookie-banner', get_stylesheet_directory_uri() . '/js/jquery.cookie-banner.min.js', array('jquery'), false );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Enqueue Google Fonts
 */
// function custom_add_google_fonts() {
// 	$query_args = array(
// 		'family' => 'Open+Sans|Merriweather'
// 	);

// 	wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
// 	wp_enqueue_style( 'google-fonts' );
// }
// add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );

/**
 * Enqueue Font Awesome.
 */
function custom_load_font_awesome() {

    wp_enqueue_script( 'font-awesome-free', '//use.fontawesome.com/releases/v5.0.13/js/all.js', array(), null );

}
add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome' );

/**
 * Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return   Filtered HTML script tag.
 */
function add_defer_attribute( $tag, $handle ) {

    if ( 'font-awesome' === $handle ) {
        $tag = str_replace( ' src', ' defer src', $tag );
    }

    return $tag;

}
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Register Navigation Menus
function custom_navigation_menus() {

    // Removes the parent theme menu
    unregister_nav_menu( 'primary' );

	$locations = array(
		'header_menu' => __( 'Primary Menu', 'text_domain' ),
		'header_shortcuts' => __( 'Primary Shortcuts', 'text_domain' ),
		'footer_menu' => __( 'Footer Menu', 'text_domain' ),
		'help_menu' => __( 'Help Menu', 'text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );


if ( ! function_exists( 'tewwie_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function tewwie_widgets_init() {
		unregister_sidebar( 'right-sidebar' );

		register_sidebar( array(
			'name'          => __( 'Nav Sidebar', 'tewwie' ),
			'id'            => 'nav-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<div id="%1$s" class="card bg-light border-0"><div class="card-body">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="card-title text-primary">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'tewwie_widgets_init' );

// Disable Contact Form 7 CSS
add_filter( 'wpcf7_load_css', '__return_false' );

if ( ! function_exists ( 'tewwie_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function tewwie_setup() {
		$header_settings = apply_filters(
			'custom_header_settings', array(
				'height'      => 250,
				'flex-height' => true,
				'header-text' => false,
			)
		);
		add_theme_support( 'custom-header', $header_settings );
	}
}
add_action( 'after_setup_theme', 'tewwie_setup' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {

		return $post_excerpt . '<br><a class="badge badge-primary" href="' . esc_url( get_permalink( get_the_ID() )) . '">' . __( 'Read More',
		'understrap' ) . ' <i class="fas fa-angle-double-right"></i></a>';
	}
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

/**
 * Define Allowed Files to be included.

 */
function tewwie_filter_features( ) {
	$files_to_load = array(
		'tewwie-news-section',
		'tewwie-events-section',
	);

	return $files_to_load;
}
add_filter( 'tewwie_filter_features', 'tewwie_filter_features' );

/**
 * Include features files.
 */
function tewwie_include_features() {
	$tewwie_allowed_phps = apply_filters( 'tewwie_filter_features', 'tewwie_filter_features' );

	foreach ( $tewwie_allowed_phps as $file ) {
		$tewwie_file_to_include = TEWWIE_PHP_INCLUDE . $file . '.php';
		if ( file_exists( $tewwie_file_to_include ) ) {
			include_once( $tewwie_file_to_include );
		}
	}
}
add_action( 'after_setup_theme', 'tewwie_include_features', 0 );

/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
add_theme_support( 'title-tag' );

/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	)
);

add_theme_support( 'gutenberg', array( 'wide-images' => false ) );

// Add support for custom color palettes in Gutenberg.
function tewwie_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', '@@textdomain' ),
				'slug' => 'primary',
				'color' => 'rgb(94, 114, 228)',
			),
			array(
				'name'  => esc_html__( 'Secondary', '@@textdomain' ),
				'slug' => 'secondary',
				'color' => 'rgb(245, 54, 92)',
			),
			array(
				'name'  => esc_html__( 'Green', '@@textdomain' ),
				'slug' => 'green',
				'color' => 'rgb(67, 170, 139)',
			),
			array(
				'name'  => esc_html__( 'Dark Grey', '@@textdomain' ),
				'slug' => 'dark-grey',
				'color' => 'rgb(68,68,68)',
			)
		)
	);
}
add_action( 'after_setup_theme', 'tewwie_gutenberg_color_palette' );

function tewwie_block_editor_styles() {
    wp_enqueue_style( 'mytheme-block-editor-styles', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'tewwie_block_editor_styles' );

// Remove p tags from category description
remove_filter('term_description','wpautop');

/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function child_theme_remove_page_template( $page_templates ) {
	unset( $page_templates['page-templates/blank.php'],$page_templates['page-templates/empty.php'], $page_templates['page-templates/fullwidthpage.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );