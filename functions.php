<?php
/**
 * Alcatraz Child functions and definitions.
 */

define( 'ALCTRAZ_CHILD_VERSION', '1.0.0' );
define( 'ALCATRAZ_FILE_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'ALCATRAZ_CHILD_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_action( 'wp_enqueue_scripts', 'alcatraz_child_enqueue_scripts' );
/**
 * Enqueue Alcatraz Child scripts and stylesheets.
 */
function alcatraz_child_enqueue_scripts() {
	
	// Include Alcatraz parent theme stylesheet.
	wp_enqueue_style(
		'alcatraz-style',
		get_template_directory_uri() . '/style.css',
		array(),
		ALCATRAZ_CHILD_VERSION
	);
	
	// Include this theme's stylesheet with the parent stylesheet,
	// and set parent stylesheet as a dependency so the parent
	// styleshee loads first.
	wp_enqueue_style(
		'alcatraz-child-style',
		get_stylesheet_uri(),
		array( 'alcatraz-style' ),
		ALCATRAZ_CHILD_VERSION
	);
}