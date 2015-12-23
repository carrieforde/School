<?php

/**
 * Output the menu post type content.
 *
 * @since 1.0.0
 */
function school_menu_output() {

	if ( function_exists( 'get_field' ) ) {

		$menus = get_field( 'menus' );

		if ( $menus ) {

			echo '<div class="school-menu-wrapper">';

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

			echo '</div>';
		}
	}
}
