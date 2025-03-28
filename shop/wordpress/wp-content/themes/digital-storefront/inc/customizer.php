<?php
/**
 * Digital Storefront Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Digital Storefront
 */

if ( ! defined( 'DIGITAL_STOREFRONT_URL' ) ) {
    define( 'DIGITAL_STOREFRONT_URL', esc_url( 'https://www.themagnifico.net/products/storefront-wordpress-theme', 'digital-storefront') );
}
if ( ! defined( 'DIGITAL_STOREFRONT_TEXT' ) ) {
    define( 'DIGITAL_STOREFRONT_TEXT', __( 'Digital Storefront Pro','digital-storefront' ));
}

if ( ! defined( 'DIGITAL_STOREFRONT_LINK' ) ) {
    define( 'DIGITAL_STOREFRONT_LINK', esc_url( 'https://www.themagnifico.net/products/storefront-wordpress-theme/','digital-storefront' ));
}

if ( ! defined( 'DIGITAL_STOREFRONT_BUY_TEXT' ) ) {
    define( 'DIGITAL_STOREFRONT_BUY_TEXT', __( 'Buy Digital Storefront Pro','digital-storefront' ));
}

use WPTRT\Customize\Section\Digital_Storefront_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Digital_Storefront_Button::class );

    $manager->add_section(
        new Digital_Storefront_Button( $manager, 'digital_storefront_pro', [
            'title'       => esc_html( DIGITAL_STOREFRONT_TEXT, 'digital-storefront' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'digital-storefront' ),
            'button_url'  => esc_url( DIGITAL_STOREFRONT_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'digital-storefront-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'digital-storefront-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function digital_storefront_customize_register($wp_customize){

    // Pro Version
    class Digital_Storefront_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( DIGITAL_STOREFRONT_BUY_TEXT,'digital-storefront' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Digital_Storefront_sanitize_custom_control( $input ) {
        return $input;
    }


    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('digital_storefront_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'digital_storefront_sanitize_number_absint'
    ));
    $wp_customize->add_control('digital_storefront_logo_max_height',array(
        'label' => esc_html__('Logo Width','digital-storefront'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('digital_storefront_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'digital-storefront' ),
        'section'        => 'title_tagline',
        'settings'       => 'digital_storefront_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'digital-storefront' ),
        'section'        => 'title_tagline',
        'settings'       => 'digital_storefront_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_storefront_logo_title_color', array(
        'label'    => __('Site Title Color', 'digital-storefront'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('digital_storefront_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_storefront_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'digital-storefront'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Theme Color
    $wp_customize->add_section('digital_storefront_color_option',array(
        'title' => esc_html__('Theme Color','digital-storefront'),
    ));

    $wp_customize->add_setting( 'digital_storefront_theme_color', array(
        'default' => '#ff6868',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_theme_color', array(
        'label' => esc_html__('Color Option','digital-storefront'),
        'section' => 'digital_storefront_color_option',
        'settings' => 'digital_storefront_theme_color'
    )));

    $wp_customize->add_setting( 'digital_storefront_theme_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_theme_color', array(
        'label' => esc_html__('Color Option One','digital-storefront'),
        'section' => 'digital_storefront_color_option',
        'settings' => 'digital_storefront_theme_color'
    )));

    $wp_customize->add_setting( 'digital_storefront_theme_color_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_theme_color_2', array(
        'label' => esc_html__('Color Option Two','digital-storefront'),
        'section' => 'digital_storefront_color_option',
        'settings' => 'digital_storefront_theme_color_2'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_color_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_theme_color_setting', array(
        'section'     => 'digital_storefront_color_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Header
    $wp_customize->add_section('digital_storefront_header_top',array(
        'title' => esc_html__('Header','digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_header_offer_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_header_offer_text',array(
        'label' => esc_html__('Add Offer Text','digital-storefront'),
        'section' => 'digital_storefront_header_top',
        'setting' => 'digital_storefront_header_offer_text',
        'type'  => 'text'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'digital_storefront_header_top',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('digital_storefront_general_settings',array(
        'title' => esc_html__('General Settings','digital-storefront'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('digital_storefront_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','digital-storefront' ),
        'type' => 'radio',
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','digital-storefront'),
            'Wide Width' => __('Wide Width','digital-storefront'),
            'Container Width' => __('Container Width','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'digital-storefront' ),
        'section'        => 'digital_storefront_general_settings',
        'settings'       => 'digital_storefront_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_preloader_type',array(
        'default' => 'Preloader 1',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_preloader_type',array(
        'type' => 'radio',
        'label' => esc_html__('Preloader Type','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Preloader 1' => __('Preloader 1','digital-storefront'),
            'Preloader 2' => __('Preloader 2','digital-storefront'),
        ),
    ) );

    $wp_customize->add_setting( 'digital_storefront_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'digital_storefront_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_preloader_dot_1_color',
        'active_callback' => 'digital_storefront_preloader1'
    )));

    $wp_customize->add_setting( 'digital_storefront_preloader_dot_2_color', array(
        'default' => '#f10026',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_preloader_dot_2_color',
        'active_callback' => 'digital_storefront_preloader1'
    )));

    $wp_customize->add_setting( 'digital_storefront_preloader2_dot_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_preloader2_dot_color', array(
        'label' => esc_html__('Preloader Dot Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_preloader2_dot_color',
        'active_callback' => 'digital_storefront_preloader2'
    )));

    $wp_customize->add_setting('digital_storefront_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'digital-storefront' ),
        'section'        => 'digital_storefront_general_settings',
        'settings'       => 'digital_storefront_sticky_header',
        'type'           => 'checkbox',
    )));
    $wp_customize->add_setting('digital_storefront_scroll_hide', array(
        'default' => '',
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'digital-storefront' ),
        'section'        => 'digital_storefront_general_settings',
        'settings'       => 'digital_storefront_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','digital-storefront' ),
        'type' => 'radio',
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Right' => __('Right','digital-storefront'),
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting( 'digital_storefront_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'digital_storefront_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'settings' => 'digital_storefront_scroll_color'
    )));

    $wp_customize->add_setting('digital_storefront_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','digital-storefront'),
        'description' => __('Put in px','digital-storefront'),
        'section'   => 'digital_storefront_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'digital_storefront_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','digital-storefront' ),
        'section'     => 'digital_storefront_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'digital_storefront_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'digital_storefront_sanitize_select',
    ) );

    $wp_customize->add_control('digital_storefront_products_per_row', array(
        'label' => __( 'Product per row', 'digital-storefront' ),
        'section'  => 'digital_storefront_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'digital_storefront_sanitize_float'
    ));
    $wp_customize->add_control('digital_storefront_product_per_page',array(
        'label' => __('Product per page','digital-storefront'),
        'section'   => 'digital_storefront_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('digital_storefront_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'digital-storefront' ),
        'section'        => 'digital_storefront_general_settings',
        'settings'       => 'digital_storefront_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-storefront'),
            'Right Sidebar' => __('Right Sidebar','digital-storefront'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('digital_storefront_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'digital-storefront' ),
        'section'        => 'digital_storefront_general_settings',
        'settings'       => 'digital_storefront_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','digital-storefront'),
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','digital-storefront'),
            'Right Sidebar' => __('Right Sidebar','digital-storefront'),
        ),
    ) );

    $wp_customize->add_setting( 'digital_storefront_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','digital-storefront' ),
        'section'     => 'digital_storefront_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'digital_storefront_general_settings',
        'choices' => array(
            'Right' => __('Right','digital-storefront'),
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting( 'digital_storefront_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','digital-storefront' ),
        'section'     => 'digital_storefront_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'digital_storefront_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','digital-storefront' ),
        'section'     => 'digital_storefront_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 170,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'digital_storefront_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Social Link
    $wp_customize->add_section('digital_storefront_social_link',array(
        'title' => esc_html__('Social Links','digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_header_social_icon', array(
        'default' => 0,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_header_social_icon',array(
        'label'          => __( 'Enable Social Icon', 'digital-storefront' ),
        'section'        => 'digital_storefront_social_link',
        'settings'       => 'digital_storefront_header_social_icon',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_facebook_icon',array(
        'label' => esc_html__('Add Facebook Icon','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','digital-storefront')
    ));

    $wp_customize->add_setting('digital_storefront_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('digital_storefront_facebook_url',array(
        'label' => esc_html__('Facebook Link','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('digital_storefront_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_twitter_icon',array(
        'label' => esc_html__('Add Twitter Icon','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','digital-storefront')
    ));

    $wp_customize->add_setting('digital_storefront_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('digital_storefront_twitter_url',array(
        'label' => esc_html__('Twitter Link','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('digital_storefront_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_intagram_icon',array(
        'label' => esc_html__('Add Intagram Icon','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_intagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','digital-storefront')
    ));

    $wp_customize->add_setting('digital_storefront_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('digital_storefront_intagram_url',array(
        'label' => esc_html__('Intagram Link','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('digital_storefront_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_linkedin_icon',array(
        'label' => esc_html__('Add Linkedin Icon','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','digital-storefront')
    ));

    $wp_customize->add_setting('digital_storefront_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('digital_storefront_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('digital_storefront_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_pintrest_icon',array(
        'label' => esc_html__('Add Pinterest Icon','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_pintrest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','digital-storefront')
    ));

   
    $wp_customize->add_setting('digital_storefront_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('digital_storefront_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','digital-storefront'),
        'section' => 'digital_storefront_social_link',
        'setting' => 'digital_storefront_pintrest_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'digital_storefront_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('digital_storefront_menu_settings',array(
        'title' => esc_html__('Menus Settings','digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','digital-storefront'),
        'section' => 'digital_storefront_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('digital_storefront_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','digital-storefront'),
        'choices' => array(
            'Uppercase' => __('Uppercase','digital-storefront'),
            'Capitalize' => __('Capitalize','digital-storefront'),
            'Lowercase' => __('Lowercase','digital-storefront'),
        ),
        'section'=> 'digital_storefront_menu_settings',
    ));

    $wp_customize->add_setting('digital_storefront_nav_menu_font_weight',array(
        'default'=> '400',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','digital-storefront'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'digital_storefront_menu_settings',
    ));

    //Slider
    $wp_customize->add_section('digital_storefront_top_slider',array(
        'title' => esc_html__('Slider Option','digital-storefront'),
        'description' => esc_html__('Here you have to add 3 different post categories in below dropdown. Image Dimension ( 500px x 500px )','digital-storefront')
    ));

    $wp_customize->add_setting('digital_storefront_slider_section_setting', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_slider_section_setting',array(
        'label'          => __( 'Enable Disable Slider', 'digital-storefront' ),
        'section'        => 'digital_storefront_top_slider',
        'settings'       => 'digital_storefront_slider_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_slider_loop', array(
        'default' => 1,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_slider_loop',array(
        'label'          => __( 'Enable Slider Loop', 'digital-storefront' ),
        'section'        => 'digital_storefront_top_slider',
        'settings'       => 'digital_storefront_slider_loop',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'digital-storefront' ),
        'section'        => 'digital_storefront_top_slider',
        'settings'       => 'digital_storefront_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('digital_storefront_slider_button_setting', array(
        'default' => 1,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_slider_button_setting',array(
        'label'          => __( 'Enable Disable Slider Button', 'digital-storefront' ),
        'section'        => 'digital_storefront_top_slider',
        'settings'       => 'digital_storefront_slider_button_setting',
        'type'           => 'checkbox',
    )));

    for ( $digital_storefront_count = 1; $digital_storefront_count <= 3; $digital_storefront_count++ ) {
        $wp_customize->add_setting( 'digital_storefront_top_slider_page' . $digital_storefront_count, array(
            'default'           => '',
            'sanitize_callback' => 'digital_storefront_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'digital_storefront_top_slider_page' . $digital_storefront_count, array(
            'label'    => __( 'Select Slide Page', 'digital-storefront' ),
            'description' => __('Slider image size (1400 x 550)','digital-storefront'),
            'section'  => 'digital_storefront_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider button text
    $wp_customize->add_setting('digital_storefront_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_slider_button_text',array(
        'label' => __('Slider Button Text','digital-storefront'),
        'section'=> 'digital_storefront_top_slider',
        'type'=> 'text'
    ));

    //Slider Image Opacity
    $wp_customize->add_setting('digital_storefront_slider_opacity_setting', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_slider_opacity_setting',array(
        'label'    => __( 'Show Image Opacity', 'digital-storefront' ),
        'section'  => 'digital_storefront_top_slider',
        'type'     => 'checkbox',
    )));

    $wp_customize->add_setting( 'digital_storefront_image_opacity_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'digital_storefront_image_opacity_color', array(
        'label' => __('Slider Image Opacity Color', 'digital-storefront'),
        'section' => 'digital_storefront_top_slider',
        'settings' => 'digital_storefront_image_opacity_color',
    )));

    $wp_customize->add_setting('digital_storefront_slider_opacity',array(
        'default'=> '0.8',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_slider_opacity',array(
        'type' => 'select',
        'label' => esc_html__('Slider Image Opacity','digital-storefront'),
        'choices' => array(
            '0'   => '0',
            '0.1' => '0.1',
            '0.2' => '0.2',
            '0.3' => '0.3',
            '0.4' => '0.4',
            '0.5' => '0.5',
            '0.6' => '0.6',
            '0.7' => '0.7',
            '0.8' => '0.8',
            '0.9' => '0.9',
            '1'   => '1',
        ),
        'section'=> 'digital_storefront_top_slider',
    ));

    //Slider height
    $wp_customize->add_setting('digital_storefront_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('digital_storefront_slider_img_height',array(
        'label' => __('Slider Height','digital-storefront'),
        'description'   => __('Add the slider height in px(eg. 500px).','digital-storefront'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'digital-storefront' ),
        ),
        'section'=> 'digital_storefront_top_slider',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('digital_storefront_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','digital-storefront'),
        'choices' => array(
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront'),
            'Right' => __('Right','digital-storefront'),
        ),
        'section'=> 'digital_storefront_top_slider',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'digital_storefront_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    //Our Services section
    $wp_customize->add_section( 'digital_storefront_services_section' , array(
        'title'      => __( 'Services Settings', 'digital-storefront' ),
        'priority'   => null
    ) );

    $wp_customize->add_setting('digital_storefront_services_on_off', array(
        'default' => '1',
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_services_on_off',array(
        'label'          => __( 'Show Services', 'digital-storefront' ),
        'section'        => 'digital_storefront_services_section',
        'settings'       => 'digital_storefront_services_on_off',
        'type'           => 'checkbox',
    )));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('digital_storefront_services',array(
        'default'   => 'select',
        'sanitize_callback' => 'digital_storefront_sanitize_choices',
    ));
    $wp_customize->add_control('digital_storefront_services',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Services','digital-storefront'),
        'description' => __('Image Size (50 x 50)','digital-storefront'),
        'section' => 'digital_storefront_services_section',
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_services_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_services_setting', array(
        'section'     => 'digital_storefront_services_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    //About
    $wp_customize->add_section('digital_storefront_about_section',array(
        'title' => esc_html__('About Settings','digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_about_setting', array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'digital_storefront_about_setting',array(
        'label'          => __( 'Enable Disable About', 'digital-storefront' ),
        'section'        => 'digital_storefront_about_section',
        'settings'       => 'digital_storefront_about_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'digital_storefront_about_page', array(
        'default'           => '',
        'sanitize_callback' => 'digital_storefront_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'digital_storefront_about_page', array(
        'label'    => __( 'Select About Page', 'digital-storefront' ),
        'section'  => 'digital_storefront_about_section',
        'type'     => 'dropdown-pages'
    ) );

     // Pro Version
    $wp_customize->add_setting( 'pro_version_about_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_about_setting', array(
        'section'     => 'digital_storefront_about_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('digital_storefront_site_footer_section', array(
        'title' => esc_html__('Footer', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control('digital_storefront_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('digital_storefront_footer_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_storefront_footer_background_color', array(
        'label'    => __('Footer Background Color', 'digital-storefront'),
        'section'  => 'digital_storefront_site_footer_section',
    )));

    $wp_customize->add_setting('digital_storefront_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'digital_storefront_footer_bg_image',array(
        'label' => __('Footer Background Image','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
    )));

    $wp_customize->add_setting('digital_storefront_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','digital-storefront'),
        'choices' => array(
            'fixed' => __('fixed','digital-storefront'),
            'scroll' => __('scroll','digital-storefront'),
        ),
        'section'=> 'digital_storefront_site_footer_section',
    ));

    $wp_customize->add_setting('digital_storefront_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
        'choices' => array(
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront'),
            'Right' => __('Right','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
        'choices' => array(
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront'),
            'Right' => __('Right','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control('digital_storefront_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
    ));

    $wp_customize->add_setting('digital_storefront_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('digital_storefront_footer_text_setting', array(
        'label' => __('Replace the footer text', 'digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('digital_storefront_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'digital_storefront_sanitize_choices'
    ));
    $wp_customize->add_control('digital_storefront_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','digital-storefront'),
        'section' => 'digital_storefront_site_footer_section',
        'choices' => array(
            'Left' => __('Left','digital-storefront'),
            'Center' => __('Center','digital-storefront'),
            'Right' => __('Right','digital-storefront')
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'digital_storefront_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'digital-storefront'),
        'section'  => 'digital_storefront_site_footer_section',
    )));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'digital_storefront_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('digital_storefront_post_settings',array(
        'title' => esc_html__('Post Settings','digital-storefront'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('digital_storefront_post_page_title',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_post_page_thumb',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting( 'digital_storefront_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','digital-storefront' ),
        'section'     => 'digital_storefront_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_post_page_content',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_post_page_excerpt_length',array(
        'sanitize_callback' => 'digital_storefront_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('digital_storefront_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('digital_storefront_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('digital_storefront_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_post_page_cat',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_post_page_cat',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Category and Tags', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable category and tags on post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_post_page_pagination',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_single_post_thumb',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'digital-storefront'),
    ));

    $wp_customize->add_setting( 'digital_storefront_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','digital-storefront' ),
        'section'     => 'digital_storefront_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'digital_storefront_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'digital_storefront_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'digital_storefront_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','digital-storefront' ),
        'section'     => 'digital_storefront_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('digital_storefront_single_post_title',array(
            'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_single_post_page_content',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_single_post_cat',array(
            'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_post_cat',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Category and Tags', 'digital-storefront'),
        'section'     => 'digital_storefront_post_settings',
        'description' => esc_html__('Check this box to enable category and tags on single post.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control('digital_storefront_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','digital-storefront'),
        'section' => 'digital_storefront_post_settings',
    ));

    $wp_customize->add_setting('digital_storefront_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('digital_storefront_single_post_comment_title',array(
        'label' => __('Add Comment Title','digital-storefront'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'digital-storefront' ),
        ),
        'section'=> 'digital_storefront_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('digital_storefront_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('digital_storefront_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','digital-storefront'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'digital-storefront' ),
        ),
        'section'=> 'digital_storefront_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'digital_storefront_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('digital_storefront_page_settings',array(
        'title' => esc_html__('Page Settings','digital-storefront'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('digital_storefront_single_page_title',array(
            'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'digital-storefront'),
        'section'     => 'digital_storefront_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'digital-storefront'),
    ));

    $wp_customize->add_setting('digital_storefront_single_page_thumb',array(
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('digital_storefront_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'digital-storefront'),
        'section'     => 'digital_storefront_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'digital-storefront'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Digital_Storefront_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'digital_storefront_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'digital-storefront' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'digital_storefront_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function digital_storefront_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function digital_storefront_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digital_storefront_customize_preview_js(){
    wp_enqueue_script('digital-storefront-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'digital_storefront_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function digital_storefront_panels_js() {
    wp_enqueue_style( 'digital-storefront-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'digital-storefront-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'digital_storefront_panels_js' );

