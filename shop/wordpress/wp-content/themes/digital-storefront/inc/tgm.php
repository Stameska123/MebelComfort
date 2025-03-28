<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function digital_storefront_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Magnify – Suggestive Search', 'digital-storefront' ),
			'slug'             => 'magnify-suggestive-search',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'digital_storefront_register_recommended_plugins' );