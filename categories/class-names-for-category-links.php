<?php
/*
	Plugin Name: [ + ] Class Names for Category Links
	Plugin URI: https://github.com/m0ze/wpts/
	Description: Functional plugin that adds unique class names for category links.
	Author: m0ze
	Version: 1.2
	Author URI: https://m0ze.ru/
	Requires at least: 5.5
	Requires PHP: 7.0
	License: GPL3
*/
	
if ( ! defined( 'ABSPATH' ) ) exit( 'Nope :)' );
	
function wpts_class_names_for_category_links( $thelist ) {
	$categories = get_the_category();
	$output = "";
	if ( !$categories || is_wp_error( $categories ) ) {
		return $thelist;
	}

	foreach ( $categories as $category ) {
		$output .= '<a class="category-' . $category->slug . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->name . '</a>';
	}

	return $output;
}

! is_admin() and add_filter( 'the_category', 'wpts_class_names_for_category_links' );
