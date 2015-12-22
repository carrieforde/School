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
		get_stylesheet_directory_uri() . '/assets/webfonts/MyFontsWebfontsKit.css',
		array(),
		ALCATRAZ_CHILD_VERSION
	);
}

add_action( 'alcatraz_after_content_inside', 'school_menu_output' );
/**
 * Output the menu post type content.
 *
 * @since 1.0.0
 */
function school_menu_output() {

	if ( is_singular( 'menu' ) ) {

		$menus = get_field( 'menus' );

		if ( $menus ) {

			foreach ( $menus as $menu ) {

				if ( ! empty( $menu['course'] ) ) {
					echo '<h2 class="school-menu-course">' . sanitize_text_field( $menu['course'] ) . '</h2>';
				}

				echo '<h3 class="school-menu-item-heading">';

					echo '<span class"school-menu-item">' . sanitize_text_field( $menu['menu_item_name'] ) . '</span>';

					echo '<span class="school-menu-price">' . sanitize_text_field( $menu['price'] ) . '</span>';

				echo '</h3>';

				if ( ! empty( $menu['source'] ) ) {
					echo '<p class="school-menu-source">' . sanitize_text_field( $menu['source'] ) . '</p>';
				}

				echo '<p class="school-menu-description">' . sanitize_text_field( $menu['menu_item_description'] ) . '</p>';
			}
		}
	}
}
