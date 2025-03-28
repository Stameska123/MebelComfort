<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function modern_furniture_store_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Learnpress', 'modern-furniture-store' ),
			'slug'             => 'learnpress',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
            'name'             => __( 'Advanced Appointment Booking & Scheduling', 'modern-furniture-store' ),
            'slug'             => 'advanced-appointment-booking-scheduling',
            'required'         => false,
            'force_activation' => false,
        ),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'modern_furniture_store_register_recommended_plugins' );
