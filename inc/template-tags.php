<?php

/**
 * Output the menu post type content.
 *
 * @since 1.0.0
 */
function school_menu_output() {

	$menus = get_post_meta( get_the_id(), 'menus', true );

	if ( $menus ) {

		echo '<div class="school-menu-wrapper">';

		for ( $i = 0; $i < $menus; $i++ ) {
			$course = get_post_meta( get_the_id(), 'menus_' . $i . '_course', true );
			$menu_item = get_post_meta( get_the_id(), 'menus_' . $i . '_menu_item_name', true );
			$price     = get_post_meta( get_the_id(), 'menus_' . $i . '_price', true );
			$source    = get_post_meta( get_the_id(), 'menus_' . $i . '_source', true );
			$description = get_post_meta( get_the_id(), 'menus_' . $i . '_menu_item_description', true );

			if ( ! empty( $course ) ) {
				echo '<h2 class="school-menu-course">' . esc_attr( $course ) . '</h2>';
			}

			echo '<h3 class="school-menu-item-heading">';

				echo '<span class"school-menu-item">' . esc_attr( $menu_item ) . '</span>';

				echo '<span class="school-menu-price">' . esc_attr( $price ) . '</span>';

			echo '</h3>';

			if ( ! empty( $source ) ) {
				echo '<p class="school-menu-source">' . esc_attr( $source ) . '</p>';
			}

			echo '<p class="school-menu-description">' . esc_attr( $description ) . '</p>';
		}

		echo '</div>';
	}
}
