<?php
/**
 * Template for displaying search forms in Modern Furniture Store
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

?>

<?php $modern_furniture_store_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $modern_furniture_store_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'modern-furniture-store' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'modern-furniture-store' ); ?></button>
</form>