<?php
/**
 * Alcatraz Child functions and definitions.
 */

define( 'ALCATRAZ_CHILD_VERSION', '1.0.0' );
define( 'ALCATRAZ_FILE_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'ALCATRAZ_CHILD_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_action( 'wp_enqueue_scripts', 'school_enqueue_scripts' );
/**
 * Enqueue Alcatraz Child scripts and stylesheets.
 */
function school_enqueue_scripts() {

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
		'school-style',
		get_stylesheet_uri(),
		array( 'alcatraz-style' ),
		ALCATRAZ_CHILD_VERSION
	);

	// Add custom fonts.
	wp_enqueue_style(
		'school-fonts',
		get_stylesheet_directory_uri() . '/assets/MyFontsWebfontsKit.css',
		array(),
		ALCATRAZ_CHILD_VERSION
	);
}

require_once ALCATRAZ_FILE_PATH . 'inc/template-tags.php';

add_action( 'alcatraz_footer', 'school_output_social_network_icons', 10 );
/**
 * Output social networks above colophon.
 *
 * @since 1.0.0
 */
function school_output_social_network_icons() {

		alcatraz_the_social_network_icons();
}

add_filter( 'mm_colors', 'school_colors' );
/**
 * Set theme color options for Mm Components.
 *
 * @return  array  The array of theme colors.
 */
function school_colors( $context = 'mm-button' ) {

	$colors = array(
		'great-blue-sea' => __( 'Great Blue Sea', 'alcatraz-school' ),
		'white'          => __( 'White', 'alcatraz-school' ),
		'sea-cliff'      => __( 'Sea Cliff', 'alcatraz-school' ),
	);

	return $colors;
}

add_filter( 'mm_button_styles', 'school_button_styles' );
/**
 * Set theme button style options.
 *
 * @return  array  The array of button styles.
 */
function school_button_styles( $context = 'mm-button' ) {

	$button_style = array(
		'solid-to-ghost' => __( 'Solid to Ghost', 'alcatraz-school' ),
		'ghost'          => __( 'Ghost', 'alcatraz-school' ),
	);

	return $button_style;
}
