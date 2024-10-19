<?php

require get_stylesheet_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function charity_foundation_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Woocommerce', 'charity-foundation' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'charity_foundation_register_recommended_plugins' );