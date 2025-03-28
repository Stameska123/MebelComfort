<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function modern_furniture_store_categorized_blog() {
	$modern_furniture_store_category_count = get_transient( 'modern_furniture_store_categories' );

	if ( false === $modern_furniture_store_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$modern_furniture_store_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$modern_furniture_store_category_count = count( $modern_furniture_store_categories );

		set_transient( 'modern_furniture_store_categories', $modern_furniture_store_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $modern_furniture_store_category_count > 1;
}

if ( ! function_exists( 'modern_furniture_store_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Modern Furniture Store
 */
function modern_furniture_store_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in modern_furniture_store_categorized_blog.
 */
function modern_furniture_store_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'modern_furniture_store_categories' );
}
add_action( 'edit_category', 'modern_furniture_store_category_transient_flusher' );
add_action( 'save_post',     'modern_furniture_store_category_transient_flusher' );
