<?php # -*- coding: utf-8 -*-
/**
 * Create a nav menu with very basic markup.
 *
 * @author Thomas Scholz http://toscho.de
 * @version 1.0
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (! class_exists ( 'T5_Nav_Menu_Walker_Simple' )) :

class T5_Nav_Menu_Walker_Simple extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0)
	{
		$output     .= '<li class="nav-item">';
		$attributes  = '';

		! empty ( $item->attr_title )
			// Avoid redundant titles
			and $item->attr_title !== $item->title
			and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';

		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';

		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes  class='nav-link'>$args->link_before$title</a>"
						. "$args->link_after$args->after";

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
			'walker_nav_menu_start_el'
			,   $item_output
			,   $item
			,   $depth
			,   $args
		);
	}

	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl(&$output, $depth = 0, $args = array())
	{
		$output .= '<ul class="sub-menu">';
	}

	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl(&$output, $depth = 0, $args = array())
	{
		$output .= '</ul>';
	}

	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el(&$output, $category, $depth = 0, $args = array())
	{
		$output .= '</li>';
	}
}

endif; /* End if class exists */