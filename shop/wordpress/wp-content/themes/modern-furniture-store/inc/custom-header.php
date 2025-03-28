<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

function modern_furniture_store_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'modern_furniture_store_custom_header_args', array(
        'default-text-color' => 'fff',
        'header-text'        => false,
        'width'              => 1600,
        'height'             => 350,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'modern_furniture_store_header_style',
        'default-image'      => get_template_directory_uri() . '/assets/images/sliderimage.png',
    ) ) );

    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'modern-furniture-store' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'modern_furniture_store_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function modern_furniture_store_header_style() {
    $modern_furniture_store_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $modern_furniture_store_height     = get_theme_mod( 'modern_furniture_store_header_image_height', 350 );
    $modern_furniture_store_position   = get_theme_mod( 'modern_furniture_store_header_background_position', 'center' );
    $modern_furniture_store_attachment = get_theme_mod( 'modern_furniture_store_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $modern_furniture_store_custom_css = "
        .header-img, .single-page-img, .external-div .box-image img, .external-div {
            background-image: url('" . esc_url( $modern_furniture_store_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $modern_furniture_store_height ) . "px;
            background-position: " . esc_attr( $modern_furniture_store_position ) . ";
            background-attachment: " . esc_attr( $modern_furniture_store_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image img,.external-div {
                height: 200px;
            }
        }
    ";

    wp_add_inline_style( 'modern-furniture-store-style', $modern_furniture_store_custom_css );
}
add_action( 'wp_enqueue_scripts', 'modern_furniture_store_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function modern_furniture_store_enqueue_styles() {
    wp_enqueue_style( 'modern-furniture-store-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'modern_furniture_store_enqueue_styles' );